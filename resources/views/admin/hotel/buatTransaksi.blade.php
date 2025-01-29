@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Transaksi</div>
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="pelanggan">
                                    @if ($pengunjungs)
                                        @foreach ($pengunjungs as $pelanggan)
                                            <option value="{{ $pelanggan->id_pengunjung }}">
                                                {{ $pelanggan->nama_pengunjung }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="">tidak ada</option>
                                    @endif

                                </select>
                                <span class="mt-2"><a href="{{ url('pengunjung/create') }}">tambah</a></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jml_kamar" class="col-sm-2 col-form-label">Jumlah kamar</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jml_kamar" name="jml_kamar">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_masuk" class="col-sm-2 col-form-label">Tgl Masuk</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_keluar" class="col-sm-2 col-form-label">Tgl Keluar</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                            </div>
                        </div>
                        <button type="submit">submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
