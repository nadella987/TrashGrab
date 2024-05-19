@extends('layout.master')
@section('title', 'List Driver')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List Driver</h2>
        @if(auth()->user()->role == 'admin')
        <a  href="{{route('driver.create')}}" class="btn btn-primary">Tambah Driver</a>
        @endif   
    </div>
    </div>
    <div class="card rounded">
        <div >
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($driver->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada driver yang ditambahkan.</td>
                </tr>
                @else
                @foreach($driver as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama_pegawai}}</td>
                    <td>{{$item->email}}</td>
                    <td>@if ($item->jenis_kelamin == 'laki_laki')
                                Laki Laki
                            @elseif ($item->jenis_kelamin == 'perempuan')
                                Perempuan
                            @else
                                Tidak Diketahui
                            @endif</td>
                    <td > 
                        <a  href="{{ route('driver.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        @if(auth()->user()->role == 'admin')
                        <a  href="{{ route('driver.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('driver.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus driver ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>  
        </div>              
    </div>
</div>
  

    @endauth

@endsection
