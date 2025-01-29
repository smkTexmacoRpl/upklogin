@extends('layouts.apps')
@section('content')
<div class="container">    
    <div class="card col-md-8 offset-md-2">
        <div class="card-header">Buat Pengunjung</div>
        <div class="body-card p-4">
            <form class="row g-3" method="POST" action="{{ route('pengunjung.store') }}">
                @csrf    
                <div class="col-auto">
                    <label for="nama" class="visually">Nama Pengunjung</label>                
                    <input type="text" class="form-control" id="nama" placeholder="nama pengunjung" name="nama">
                </div>
                <div class="col-auto">
                    <label for="alamat" class="visually">Alamat</label>   
                    <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                </div>
                <div class="col-auto">
                    <label for="jk" class="visually">Jenis Kelamin</label>   
                    <select name="jk" id="jk" class="form-select">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="no_tlp" class="visually">No TLP</label>   
                    <input type="number" class="form-control" id="no_tlp" placeholder="No_tlp" name="no_tlp">
                </div>
                <div class="col-auto">
                    <label for="no_ktp" class="visually">NO KTP</label>   
                    <input type="number" class="form-control" id="no_ktp" placeholder="No Ktp" name="no_ktp">
                </div>

                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection              