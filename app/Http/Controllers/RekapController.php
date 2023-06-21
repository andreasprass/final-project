<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Http\Requests\StoreRekapRequest;
use App\Http\Requests\UpdateRekapRequest;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRekapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRekapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRekapRequest  $request
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRekapRequest $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
}
