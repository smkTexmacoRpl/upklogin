<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasas= Jasa::get();
        return view('admin.jasa.index',compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa)
    {
        
        // $jasa = Jasa::findOrFail($jasa[0]);
        return view('admin.jasa.edit',compact('jasa')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa)
    {
        //
    }
}
