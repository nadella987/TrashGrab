@extends('layout.master')
@section('title', 'Detail Driver')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Driver</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="col"> 
                            <strong>Nama Pegawai</strong>
                            <p>{{ $driver->nama_pegawai }}</p>
                        </div>
                        <div class="col">
                            <strong>Email</strong>
                            <p>{{ $driver->email }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                        <strong>Jenis Kelamin</strong>
                        <p>
                        @if ($driver->jenis_kelamin == 'laki_laki')
                                Laki Laki
                            @elseif ($driver->jenis_kelamin == 'perempuan')
                                Perempuan
                            @else
                                Tidak Diketahui
                            @endif
                        </p>
                        </div>
                        <div class="col">
                            <strong>Nomor Telpon</strong>
                            <p>{{ $driver->no_telp }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <strong>Alamat</strong>
                            <p>{{ $driver->alamat }}</p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

