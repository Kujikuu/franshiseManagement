<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Unit;
use App\Services\SearchService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;
use Psy\CodeCleaner\CallTimePassByReferencePass;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $data = User::where('type', $type)
            ->with(['plan', 'franchisor', 'franchisees', 'units'])
            ->paginate(20);

        $total_count = User::where('type', $type)->count();
        $total_active = User::where('type', $type)->where('status', 'active')->count();
        $total_inactive = User::where('type', $type)->where('status', 'inactive')->count();

        // Get plan statistics if viewing franchisors
        $planStats = [];
        if ($type == 'franchisor') {
            $plans = \App\Models\Plan::active()->get();
            foreach ($plans as $plan) {
                $planStats[$plan->name] = User::where('type', $type)
                    ->where('plan_id', $plan->id)
                    ->count();
            }
        }

        return view('dashboard.users', compact('data', 'total_inactive', 'total_active', 'total_count', 'type', 'planStats'));
    }

    public function units()
    {
        $data = User::where('franchisor_id', auth()->user()->id)
            ->with(['units', 'performances', 'royalties'])
            ->get();

        // Get units with performance data
        $units = Unit::where('franchisor_id', auth()->user()->id)
            ->with(['franchisee', 'performances', 'tasks'])
            ->get();

        // Calculate unit statistics
        $totalUnits = $units->count();
        $activeUnits = $units->where('status', 'active')->count();
        $totalRevenue = $units->sum('revenue');
        $averageRevenue = $totalUnits > 0 ? $totalRevenue / $totalUnits : 0;

        return view('dashboard.units', compact('data', 'units', 'totalUnits', 'activeUnits', 'totalRevenue', 'averageRevenue'));
    }

    public function units_show($id)
    {
        $info = User::find($id);

        return view('dashboard.single_unit' , compact('info'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function register_operator()
    {
        $code = isset($_GET['invite_code']) ? $_GET['invite_code'] : null;

        if(!isset($code)){

            echo "Invite Code is required";
        }else{

            return view('auth.register_operator' , compact('code'));
        }

    }

    public function register_franchisor()
    {
        return view('auth.register_franchisor' );

    }



    public function store_franchisor(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // user data
        $firstName  = $request->get('first_name');
        $lastName   = $request->get('last_name');
        $phone      = $request->get('phone');
        $email      = $request->get('email');
        $country    = $request->get('country');
        $province   = $request->get('province');
        $city       = $request->get('city');
        $address    = $request->get('address');
        $password   = $request->get('password');
        $type       = $request->get('type');

        // business data
        $businessName   = $request->get('business_name');
        $website        = $request->get('website');
        $legalName      = $request->get('legal_name');
        $structure      = $request->get('structure');
        $taxId          = $request->get('tax_id');
        $industry       = $request->get('industry');
        $fundingAmount  = $request->get('funding_amount');
        $fundingSource  = $request->get('funding_source');
        $businessPhone          = $request->get('business_phone');
        $businessEmail          = $request->get('business_email');

        // business files data
        $logo           = $request->file('logo');
        $disclosureDoc  = $request->file('disclosure_doc');
        $agreementDoc   = $request->file('agreement_doc');
        $operationsDoc  = $request->file('operations_doc');
        $guidelineDoc   = $request->file('guideline_doc');
        $legalDoc       = $request->file('legal_doc');

        // Save user data
        $user = User::create([
            'name'      => $firstName . ' ' . $lastName,
            'email'     => $email,
            'password'  => Hash::make($password),
            'phone'     => $phone,
            'country'   => $country,
            'province'  => $province,
            'city'      => $city,
            'address'   => $address,
            'type'      => $type,
            'brand_name'      => $businessName,
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->to('/dashboard');
        }else {
            dd($request->all());
        }
    }

    public function store_franchisee(Request $request)
    {
        // user data
        $name  = $request->get('name');
        $brand_name  = $request->get('brand_name');
        $phone      = $request->get('contact_number');
        $email      = $request->get('email');
        $country    = $request->get('country');
        $province   = $request->get('province');
        $city       = $request->get('city');


        $user = User::create([
            'name'      => $name,
            'brand_name'      => $brand_name,
            'email'     => $email,
            'password'  => Hash::make('momomomo'),
            'phone'     => $phone,
            'country'   => $country,
            'province'  => $province,
            'city'      => $city,
            'franchisor_id' => auth()->user()->id,
        ]);


        flash('Processed Successfully!');


        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)], // Unique email except for the current user
            'password' => ['nullable', 'string', 'min:8'], // Password is optional, only enforce if provided
        ]);

        // Check if the user exists
        $user = User::find($request->get('id'));

        if ($user) {
            // Existing user - retain old email
            $old_email = $user->email;
        }

        // User data
        $firstName  = $request->get('first_name');
        $lastName   = $request->get('last_name');
        $email      = $request->get('email');
        $password   = $request->get('password');
        $type       = $request->get('type');
        $status     = $request->get('status');
        $brand_name     = $request->get('brand_name');

        // Save user data (without updating the email if the user already exists)
        $user = User::updateOrCreate(
            ['id' => $request->get('id')],
            [
                'name'      => $firstName . ' ' . $lastName,
                'type'      => $type,
                'status'    => $status,
                'brand_name' => $brand_name,
                'email'     => !$user ? $email : $user->email,
            ]
        );

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($password);
            $user->save(); // Save the password update
        }

        // Flash success message and redirect back
        flash('User added/updated successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.profile', compact('user'));
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);

        return view('dashboard.profile' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $id = $request->get('userid');

        // Validation rules
        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        // Validate email if present
        if ($request->has('email')) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id];
        }

        // Validate password if present
        if ($request->has('password')) {
            $rules['password'] = 'required_with:password_confirmation|confirmed';
            $rules['password_confirmation'] = 'required_with:password';
        }

        $request->validate($rules);

        // Update user details
        $user = User::find($id);
        if (!$user) {
            flash()->error('User not found');
            return redirect()->back();
        }

        $user->name = $request->get('name');

        if ($request->has('email')) {
            $user->email = $request->get('email');
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        flash()->message('Data Updated Successfully');

        return redirect()->back();
    }

    /**
     * Update business information for a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBusinessInfo(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->get('user_id'));
        
        if (!$user || !$user->isFranchisor()) {
            flash()->error('User not found or not a franchisor');
            return redirect()->back();
        }

        // Update business information
        $user->update([
            'website' => $request->get('website'),
            'legal_name' => $request->get('legal_name'),
            'structure' => $request->get('structure'),
            'tax_id' => $request->get('tax_id'),
            'industry' => $request->get('industry'),
            'funding_amount' => $request->get('funding_amount'),
            'funding_source' => $request->get('funding_source'),
            'business_phone' => $request->get('business_phone'),
            'business_email' => $request->get('business_email'),
        ]);

        // Handle file uploads if provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoFileName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = '/uploads/business/' . $logoFileName;
            $logo->move(public_path('uploads/business'), $logoFileName);
            $user->logo_path = $logoPath;
        }

        if ($request->hasFile('disclosure_doc')) {
            $disclosureDoc = $request->file('disclosure_doc');
            $disclosureDocFileName = time() . '_' . $disclosureDoc->getClientOriginalName();
            $disclosureDocPath = '/uploads/business/' . $disclosureDocFileName;
            $disclosureDoc->move(public_path('uploads/business'), $disclosureDocFileName);
            $user->disclosure_doc_path = $disclosureDocPath;
        }

        if ($request->hasFile('agreement_doc')) {
            $agreementDoc = $request->file('agreement_doc');
            $agreementDocFileName = time() . '_' . $agreementDoc->getClientOriginalName();
            $agreementDocPath = '/uploads/business/' . $agreementDocFileName;
            $agreementDoc->move(public_path('uploads/business'), $agreementDocFileName);
            $user->agreement_doc_path = $agreementDocPath;
        }

        if ($request->hasFile('operations_doc')) {
            $operationsDoc = $request->file('operations_doc');
            $operationsDocFileName = time() . '_' . $operationsDoc->getClientOriginalName();
            $operationsDocPath = '/uploads/business/' . $operationsDocFileName;
            $operationsDoc->move(public_path('uploads/business'), $operationsDocFileName);
            $user->operations_doc_path = $operationsDocPath;
        }

        if ($request->hasFile('guideline_doc')) {
            $guidelineDoc = $request->file('guideline_doc');
            $guidelineDocFileName = time() . '_' . $guidelineDoc->getClientOriginalName();
            $guidelineDocPath = '/uploads/business/' . $guidelineDocFileName;
            $guidelineDoc->move(public_path('uploads/business'), $guidelineDocFileName);
            $user->guideline_doc_path = $guidelineDocPath;
        }

        if ($request->hasFile('legal_doc')) {
            $legalDoc = $request->file('legal_doc');
            $legalDocFileName = time() . '_' . $legalDoc->getClientOriginalName();
            $legalDocPath = '/uploads/business/' . $legalDocFileName;
            $legalDoc->move(public_path('uploads/business'), $legalDocFileName);
            $user->legal_doc_path = $legalDocPath;
        }

        $user->save();

        flash()->success('Business information updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        flash('User Deleted Successfully');

        return redirect()->back();
    }
}
