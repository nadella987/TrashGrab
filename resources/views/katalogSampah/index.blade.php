@extends('layout.master')
@section('title', 'List Katalog Sampah')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List Katalog Sampah</h2>
        @if(auth()->user()->role == 'admin')
        <a  href="{{route('katalogSampah.create')}}" class="btn btn-primary">Tambah Sampah</a>
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
                    <th scope="col">Jenis Sampah</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($katalogSampah->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada sampah yang ditambahkan.</td>
                </tr>
                @else
                @foreach($katalogSampah as $item)
                    <tr>
                    {{ $loop->iteration }}
                    <td>{{$item->jenis_sampah}}</td>
                    <td>
                                @if($item->foto)
                                <img  src="{{ asset('storage/foto/' . basename($item->foto)) }}" style="width: 100px; height: 100px;">
                                @else
                                <span>No Image</span>
                                @endif
                            </td>
                    <td>{{$item->harga}}</td>
                    <td > 
                        <a  href="{{ route('katalogSampah.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        @if(auth()->user()->role == 'admin')
                        <a  href="{{ route('katalogSampah.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('katalogSampah.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus Sampah ini?')">
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
