<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    public function index(){
        return view('logbook',[
            'logbooks' => Logbook::all(),
        ]);
    }

    public function create(){
        return view('logbook_add');
    }

    public function store(Request $req){
        $data = $req->all();
        Logbook::create($data);
        return redirect()->route('get_logbook');
    }
    
    public function edit($id){
        $data = Logbook::find($id);
        return view('logbook_edit',[
            'update' => $data,
        ]);
    }

    public function update(Request $req){
        $data = $req->except(['_token','_method']);
        Logbook::where('id', $data['id'])
        ->update($data);
        return redirect()->route('get_logbook')->with('success', 'The data has been updated');
    }

    public function destroy($id){
        Logbook::destroy($id);
        return redirect()->route('get_logbook')->with('success', 'The data has been deleted');
    }

}
