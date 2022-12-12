<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Department;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        return view('divisions',[
            'divisions' => Division::all(),
        ]);
    }

    public function create(){
        return view('divisions_add',[
            'departments' => Department::all(),
        ]);
    }

    public function store(Request $req){
        $data = $req->all();
        Division::create($data);
        return redirect()->route('get_divisions');
    }

    public function edit($id){
        $data = Division::find($id);
        $dept = Department::all();
        return view('divisions_edit', [
            'update' => $data,
            'departments' => $dept,
        ]);
    }
    
    public function update(Request $req){
        $data = $req->except(['_token','_method']);
        Division::where('id', $data['id'])
        ->update($data);
        return redirect()->route('get_divisions')->with('success', 'The data has been updated');
    }

    public function destroy($id){
        Division::destroy($id);
        return redirect()->route('get_divisions')->with('success', 'The data has been deleted');
    }
}
