<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use Illuminate\Http\Request;

class AssociateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Associate::paginate(10);

        return view('dashboard.associates', compact('data'));

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
        $firstName = $request->get('first_name');
        $lastName = $request->get('last_name');

        // Save user data (without updating the email if the user already exists)
        Associate::updateOrCreate(
            ['id' => $request->get('id')],
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'contact_number' => $request->get('contact_number'),
                'country' => $request->get('country'),
                'province' => $request->get('province'),
                'city' => $request->get('city'),
                'email' => $request->get('email'),
            ]
        );

        flash('Updated Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function show(Associate $associate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function edit(Associate $associate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Associate $associate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Associate  $associate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Associate::find($id)->delete();

        flash('Deleted Successfully');

        return redirect()->back();
    }
}
