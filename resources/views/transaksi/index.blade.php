@extends('layout.master')
@section('title', 'List Riwayat Permintaan')
@section('content')

@auth
<div class="p-4">
<div class="mb-4 ">
        <div class="d-flex justify-content-between">
        <h2 class="font-weight-bold">List Riwayat Permintaan</h2>
        <a  href="{{route('transaksi.create')}}" class="btn btn-primary">Tambah permintaan</a>
    </div>
    </div>
    <div class="card rounded">  
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Nama Pengaju</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                 </tr>
                </thead>
                <tbody>
                @if($transaksi->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada riwayat permintaan yang ditambahkan.</td>
                </tr>
                @else
                @foreach($transaksi as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->translatedFormat('d F Y') }}</td>
                    <td>{{$item->User->name}}</td>
                    <td>{{ucfirst(str_replace('_', ' ', $item->status)) }}</td>
                    <td>
                        <a  href="{{ route('transaksi.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        <a  href="{{ route('transaksi.edit', $item->id)}}" class="mr-1" ><i class="far fa-edit"></i></a>
                        <form action="{{ route('transaksi.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus riwayat permintaan ini?')">
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
  

    @endauth

@endsection
