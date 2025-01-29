<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use illuminate\View\View;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $pengunjungs = Pengunjung::get();
        return view('admin.hotel.pengunjung',compact('pengunjungs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        return view('admin.hotel.buatPengunjung');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $pengunjung = Pengunjung::latest()->first();
        $idPengunjung = "PNG";
        $tgl = date('Y-m-d'); 
        if($pengunjung == null){
           $nomorUrut = "0001";            
        }else{
           $nomorUrut= substr($pengunjung->id_pengunjung, 15,4)+1;
           $nomorUrut = "000" .$nomorUrut; 
        }
        $idPengunjung = $idPengunjung .'-'. $tgl .'-'. $nomorUrut;
       
       
    //     $request->validate([
    //     'nama' => 'required',
    //     'alamat' => 'required',
    //     'JK' => 'required',
    //     'no_tlp' => 'required',
    //     'no_ktp'=>'required',
    //    ]);
       DB::table('pengunjungs')->insert([
        'id_pengunjung'=>$idPengunjung,
        'nama_pengunjung'=>$request->nama,   
        'alamat'=>$request->alamat,
        'JK'=>$request->jk,
        'no_tlp'=>$request->no_tlp,
        'no_ktp'=>$request->no_ktp
       ]);
         
       Return redirect()->route('pengunjung.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengunjung $pengunjung)
    {
        //
    }

    public function edit(Request $request, $id_pengunjung): view
    {
        $pengunjung = Pengunjung::findOrFail($id_pengunjung);
        return view('admin.hotel.editPengunjung',compact('pengunjung'));
    }
  
    public function update(Request $request, Pengunjung $pengunjung): RedirectResponse
    {     
        DB::table('pengunjungs')->where('id_pengunjung', $pengunjung->id_pengunjung)->update([
            'nama_pengunjung'=>$request->nama,
            'alamat'=>$request->alamat,
            'JK'=>$request->jk,
            'no_tlp'=>$request->no_tlp,
            'no_ktp'=>$request->no_ktp,            
        ]); 
   
     return redirect()->route('pengunjung.index')->with('success','Data Berhasil Diubah');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung)
    {
        DB::table('pengunjungs')->where('id_pengunjung', $pengunjung->id_pengunjung)->delete();
        return redirect()->route('pengunjung.index')->with('success','Data Berhasil Dihapus');
    }
}
