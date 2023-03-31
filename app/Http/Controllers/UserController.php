<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('users',[
            "users" => User::all(),
            'divisions' => Division::all()
        ]);
    }
    
    public function get_users_add(){
        return view('users_add',[
            'divisions' => Division::all()
        ]);
    }
    
    public function store_user(Request $req){
        $data = $req->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('get_users');
        // dd($data);
    }

    public function get_update_user($id){
        $data = User::find($id);
        return view('users_edit', [
            'update' => $data,
            'divisions' => Division::all(),
        ]);
    }

    public function update_user(Request $req){
        $data = $req->except(['_token','_method']);
        User::where('id', $data['id'])
        ->update($data);
        return redirect()->route('get_users')->with('success', 'The data has been updated');
    }

    public function delete_user($id){
        User::destroy($id);
        return redirect()->route('get_users')->with('success', 'The data has been deleted');
    }

}
