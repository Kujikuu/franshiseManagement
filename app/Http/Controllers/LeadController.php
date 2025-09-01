<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lead::paginate(20);

        return view('dashboard.leads' , compact('data'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstName  = $request->get('first_name');
        $lastName   = $request->get('last_name');

        // Save user data (without updating the email if the user already exists)
        $lead = Lead::updateOrCreate(
            ['id' => $request->get('id')],
            [
                'first_name'      => $firstName ,
                'last_name'      =>  $lastName,
                'contact_number'     => $request->get('contact_number'),
                'country'   => $request->get('country'),
                'province'  => $request->get('province'),
                'city'      => $request->get('city'),
                'email'     => $request->get('email'),
                'company_name'     => $request->get('company_name'),
                'lead_source'     => $request->get('lead_source'),
                'lead_status'     => $request->get('lead_status'),
                'lead_owner'     => $request->get('lead_owner'),
                'note'     => $request->get('note'),
            ]
        );

        if($request->has('file')){
            $logo           = $request->file('file');
            $logoFileName = str_replace(' ', '_', $logo->getClientOriginalName());
            $logoPath = $logo->move(public_path('/uploads'), $logoFileName);
            $lead->file = '/uploads/' . $logoFileName;
            $lead->save();
        }


        flash('Updated Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lead::find($id)->delete();

        flash('Deleted Successfully');

        return redirect()->back();
    }
}
