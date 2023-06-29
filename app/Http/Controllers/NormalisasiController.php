<?php

namespace App\Http\Controllers;

use App\Models\Normalisasi;
use App\Http\Requests\StoreNormalisasiRequest;
use App\Http\Requests\UpdateNormalisasiRequest;

class NormalisasiController extends Controller
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
     * @param  \App\Http\Requests\StoreNormalisasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNormalisasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Normalisasi $normalisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Normalisasi $normalisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNormalisasiRequest  $request
     * @param  \App\Models\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNormalisasiRequest $request, Normalisasi $normalisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Normalisasi  $normalisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Normalisasi $normalisasi)
    {
        //
    }
}
