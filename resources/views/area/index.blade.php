@extends('layout.master')
@section('title', 'List Area')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List Area</h2>
        @if(auth()->user()->role == 'admin')
        <a  href="{{route('area.create')}}" class="btn btn-primary">Tambah Area</a>
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
                    <th scope="col">Kode Area</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($area->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada area yang ditambahkan.</td>
                </tr>
                @else
                @foreach($area as $item)
                    <tr>
                    {{ $loop->iteration }}
                    <td>{{$item->kode_area}}</td>
                    <td>{{$item->lokasi}}</td>
                    <td > 
                        <a  href="{{ route('area.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        @if(auth()->user()->role == 'admin')
                        <a  href="{{ route('area.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('area.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus area ini?')">
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
