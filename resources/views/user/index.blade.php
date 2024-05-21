@extends('layout.master')
@section('title', 'List User')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List User</h2>
        <a  href="{{route('user.create')}}" class="btn btn-primary">Tambah User</a>
    </div>
    </div>
    <div class="card rounded">
        <div >
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($user->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada User yang ditambahkan.</td>
                </tr>
                @else
                @foreach($user as $item)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->role}}</td>
                    <td > 
                        <a  href="{{ route('user.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        <a  href="{{ route('user.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('user.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus user ini?')">
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
