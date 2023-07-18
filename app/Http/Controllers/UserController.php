<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ranking;
use App\Models\Scoring;
use App\Models\Division;
use App\Models\Normalisasi;
use Illuminate\Http\Request;
use App\Models\KandidatPenilaian;
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

        $kand = KandidatPenilaian::where('user_id',$id);
        if($kand->exists() == true){ 
            $alternatif = KandidatPenilaian::where('user_id',$id)->first();
            $scoring = Scoring::where('kandidat_penilaian',$alternatif->id);  
            $norm = Normalisasi::where('kandidat_penilaian',$alternatif->id);
            $rank = Ranking::where('kandidat_penilaian',$alternatif->id);
            if($scoring->exists() == true){
                $scoring->delete();
                if($norm->exists() == true){
                    $norm->delete();
                    if($rank->exists() == true){
                        $rank->delete();
                    }
                }elseif($rank->exists() == true){
                    $rank->delete();
                }
            }elseif($norm->exists() == true){
                $norm->delete();
                if($rank->exists() == true){
                    $rank->delete();
                }
            }
            $kand->delete();
            User::where('id',$id)->delete();
        }else{
            User::where('id',$id)->delete();
        }
        return redirect()->route('get_users')->with('success', 'The data has been deleted');
    }

}
