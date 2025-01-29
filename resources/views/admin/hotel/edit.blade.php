@extends('layouts.apps')
@section('content')

<div class="container mt-4">
<div class="card col-md-8 offset-md-2">
    <div class="card-header">Jenis kamar</div>
    <div class="body-card p-4">
        
      <form class="row g-3" method="POST" action="{{route('kamar.update', $kamar->no_kamar)}}">
        @csrf
        @method('PUT')

                <div class="col-auto">
                    <input type="hidden" class="form-control" id="no_kamar" placeholder="no kamar" name="no_kamar" value="{{$kamar->no_kamar}}">
                  <label for="jenis" class="visually">Janis Kamar</label>
                  <input type="text"  class="form-control" id="jenis" placeholder="jenis kamar" name="jenis" value="{{$kamar->jenis_kamar}}">
                </div>
                <div class="col-auto">
                  <label for="harga" class="visually">Harga</label>
                  <input type="number" class="form-control" id="harga" placeholder="Password" name="harga" value="{{$kamar->harga}}">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                </div>
              
        </form>
    </div>
</div>
</div>    
@endsection

