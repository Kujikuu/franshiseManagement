<?php

namespace App\Http\Controllers;


use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{

    public function test()
    {

    }


    public function dashboard()
    {
        $data = User::where('type' , 'franchisor')->get();

        return view('dashboard.index', compact('data'));
    }

    public function myfranchise()
    {
        $info  = auth()->user();

        return view('dashboard.myfranchise', compact('info'));
    }

    public function performance()
    {
        return view('dashboard.performance');
    }

    public function royalty()
    {
        return view('dashboard.royalty');
    }


    public function tasks()
    {
        return view('dashboard.tasks');
    }


}