@extends('layout.master')
@section('title', 'List Jadwal Jemputan')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List Jadwal Penjumputan</h2>
        <a  href="{{route('jadwalPickUp.create')}}" class="btn btn-primary">Tambah Pick Up</a>
    </div>
    </div>
    <div class="card rounded">
        <div >
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode jadwal</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($jadwalPenjemputan->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada jadwal pick up yang ditambahkan.</td>
                </tr>
                @else
                @foreach($jadwalPenjemputan as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->kode_jadwal}}</td>
                    <td>{{$item->Area->lokasi}}</td>
                    <td > 
                        <a  href="{{ route('jadwalPickUp.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        <a  href="{{ route('jadwalPickUp.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('jadwalPickUp.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus jadwal penjemputan ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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
