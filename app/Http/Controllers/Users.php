<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function get_users_add(){
        return view('users_add');
    }
    
    public function store_user(Request $req){
        $data = $req->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('get_users');
    }

    public function get_update_user($id){
        $data = User::find($id);
        return view('users_edit', [
            'update' => $data,
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
