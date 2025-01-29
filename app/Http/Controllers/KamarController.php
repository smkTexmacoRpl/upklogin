<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\View\View as View;
use Illuminate\Support\Facades\DB;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamars = Kamar::get();
        return view('admin.hotel.kamar',compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       return view('admin.hotel.buat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    dd($request->all());
       DB::table('kamars')->insert([
        'jenis_kamar'=>$request->jenis,
        'harga'=>$request->harga,

       ]);
        return redirect()->route('kamar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $no_kamar) :view
    {
        $kamar = Kamar::findOrFail($no_kamar[0]);
        return view('admin.hotel.edit',compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {
        DB::table('kamars')->where('no_kamar', $kamar->no_kamar)->update([
            'jenis_kamar'=>$request->jenis,
            'harga'=>$request->harga
        ]);
        return redirect()->route('kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        DB::table('kamars')->where('no_kamar', $kamar->no_kamar)->delete();
        return redirect()->route('kamar.index');
    }
}
