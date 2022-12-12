<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return view('index');
    }
    public function get_users(){
        
    }
    public function get_position(){
        return view('positions');
    }
    public function get_division(){
        return view('positions');
    }
    public function get_department(){
        return view('department');
    }
}
