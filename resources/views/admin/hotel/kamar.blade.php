@extends('layouts.apps')
@section('content')
    <div class="container">
        <div class="mt-4">
            <a href="{{ url('kamar/create') }}" class="fs-2"><i class="fa-solid fa-circle-plus"></i></a>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Jenis Kamra</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamars as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ UCWORDS($item->jenis_kamar) }}</td>
                            <td>{{ number_format($item->harga) }}</td>
                            <td>
                                 <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kamar.destroy', $item->no_kamar) }}" method="POST">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-warning"
                                                href="{{ route('kamar.edit', $item->no_kamar) }}">Edit</a></li>
                                        <li><a class="dropdown-item text-success" href="#">View</a></li>
                                        @csrf
                                        @method('DELETE')
                                        <li><button class="dropdown-item text-danger" type="submit">Delete</button></li>
                                    </ul>
                                </div>
                                 </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
