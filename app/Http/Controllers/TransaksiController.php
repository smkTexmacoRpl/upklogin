<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hotel.transaksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        $pengunjungs = \App\Models\Pengunjung::get();
        return view('admin.hotel.buatTransaksi',compact('pengunjungs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'no_kamar' => 'required',
            'tgl_check_in' => 'required',
            'tgl_check_out' => 'required',
            'total_harga' => 'required',
        ]);
        $tgl_masuk = $request->tgl_masuk;
        $tgl_keluar = $request->tgl_keluar;
        $datetime1 = new DateTime($tgl_masuk);
        $datetime2 = new DateTime($tgl_keluar);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        dd($request->all());
        Transaksi::create([
            'no_kamar'=>$request->no_kamar,
            'tgl_check_in'=>$request->tgl_check_in,
            'tgl_check_out'=>$request->tgl_check_out,
            'total_harga'=>$request->total_harga,
        ]); 
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
