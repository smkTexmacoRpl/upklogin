@extends('layouts.apps')
@section('content')

<div class="container mt-4">
    <div class="card col-md-10  offset-md-1">
        <div class="card-header">Pengunjung</div>
        <div class="body-card p-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">id_pengunjung</th>
                        <th scope="col">Nama</th>
                        <th scope="col">alamat</th>
                        <th scope="col">JK</th>
                        <th scope="col">no_tlp</th>
                        <th scope="col">no_ktp</th>                        
                        <th scope="col">Action</th>
                    </tr>               
                </thead>                                                                                            
                <tbody>
                    @foreach ($pengunjungs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>  
                        <td>{{ $item->id_pengunjung }}</td>
                        <td>{{ $item->nama_pengunjung }}</td>
                        <td>{{ $item->JK }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_tlp }} </td>
                        <td>{{ $item->no_ktp }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengunjung.destroy', $item->id_pengunjung) }}" method="POST">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a> 
                                    <ul class="dropdown-menu">    
                                        <li><a class="dropdown-item text-warning"
                                                href="{{ route('pengunjung.edit', $item->id_pengunjung) }}">Edit</a></li>
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
        </div>
    </div>
</div>
@endsection
