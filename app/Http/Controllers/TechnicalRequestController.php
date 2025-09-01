<?php

namespace App\Http\Controllers;

use App\Models\TechnicalRequest;
use Illuminate\Http\Request;

class TechnicalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = TechnicalRequest::orderby('id', 'desc')->paginate(25);

        return view('dashboard.technical_requests', compact('data'));
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
        TechnicalRequest::updateOrCreate([
            'id'=> $request->get('id')
        ], [
            'status'=> $request->get('status')
        ]);

        flash('Updated Successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechnicalRequest  $technicalRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicalRequest $technicalRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechnicalRequest  $technicalRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(TechnicalRequest $technicalRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TechnicalRequest  $technicalRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechnicalRequest $technicalRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechnicalRequest  $technicalRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TechnicalRequest::find($id)->delete();

        flash('Deleted Successfully');

        return redirect()->back();
    }
}
