<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('departments',[
            'departments' => Department::all(),
        ]);
    }

    public function create(){
        return view('departments_add');
    }

    public function store(Request $req){
        $data = $req->all();
        Department::create($data);
        return redirect()->route('get_departments');
    }

    public function edit($id){
        $data = Department::find($id);
        return view('departments_edit', [
            'update' => $data,
        ]);
    }
    
    public function update(Request $req){
        $data = $req->except(['_token','_method']);
        Department::where('id', $data['id'])
        ->update($data);
        return redirect()->route('get_departments')->with('success', 'The data has been updated');
    }

    public function destroy($id){
        Department::destroy($id);
        return redirect()->route('get_departments')->with('success', 'The data has been deleted');
    }
    
}
