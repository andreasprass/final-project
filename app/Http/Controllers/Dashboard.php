<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rekap;
use App\Models\Criteria;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return view('index',[
            'user' => User::get()->where('status', 1)->count() ,
            'rekap' => Rekap::get()->count(),
            'kriteria' => Criteria::get()->count(),
        ]);
    }

    public function profile(){
        return view('profile/myprofile');
    }

}
