@extends('layout.master')
@section('title', 'Beranda')
@section('content')

@auth
    {{-- welcome --}}
    <div class="card mb-3">
        <div class="card-body  rounded text-white" style="background-color: #FFC94A;">
            <h1><b>Hi, {{ auth()->user()->name }}</b></h1>
            <span>Bagaimana kabarmu hari ini?</span>
        </div>
    </div>

    @if(auth()->user()->role == 'admin')
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
                @if($transaksiAdmin->isEmpty())
                <tr>
                    <td colspan="5" class="text-start">Tidak ada riwayat permintaan yang ditambahkan.</td>
                </tr>
                @else
                @foreach($transaksiAdmin as $item)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->JadwalPickup->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->translatedFormat('d F Y') }}</td>
                    <td>{{$item->User->name}}</td>
                    <td>{{ucfirst(str_replace('_', ' ', $item->status)) }}</td>
    
                    <td>
                        <a  href="{{ route('transaksi.show', $item->id)}}" class="mr-3"><i class="far fa-eye"></i></a>
                        @if(auth()->user()->role == 'admin')
                                <a href="{{ route('transaksi.edit', $item->id) }}" class="mr-1"><i class="far fa-edit"></i></a>
                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Anda yakin ingin menghapus riwayat permintaan ini?')">
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
    @endif

 

@endauth

@endsection
