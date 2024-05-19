@extends('layout.master')
@section('title', 'Tambah Transaksi')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Tambah Permintaan</strong></h2>
                    </div>
                    <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="form-group mt-4">
                    <label for="id_user">Nama Pengaju:</label>
                    <select id="id_user" name="id_user"   class="form-control form-control-user @error('id_user')is-invalid @enderror">
                        <option value="" disabled selected>Pilih Nama Pengaju</option>
                        @foreach($user as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('id_user')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="id_jadwal">Jadwal Penjemputan:</label>
                    <select id="id_jadwal" name="id_jadwal"   class="form-control form-control-user @error('id_jadwal')is-invalid @enderror">
                        <option value="" disabled selected>Pilih Jadwal</option>
                        @foreach($jadwal as $item)
                            <option value="{{ $item->id }}">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</option>
                        @endforeach
                    </select>
                    @error('id_jadwal')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
                
                <div class="form-group mt-4">
                    <label for="tanggal_transaksi">Tanggal Transaksi :</label>
                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi"   class="form-control form-control-user @error('tanggal_transaksi')is-invalid @enderror" placeholder="Tambahkan Nomor Telepon" >
                @error('tanggal_transaksi')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="alamat_jemput">Alamat Jemput :</label>
                    <textarea   class="form-control form-control-user @error('alamat_jemput')is-invalid @enderror" id="alamat_jemput" name="alamat_jemput" rows="5" placeholder="Masukan Alamat Jemput"></textarea>
                @error('alamat_jemput')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
                

                <div class="form-group mt-4">
                    <label for="status">Status:</label>
                    <select id="status" name="status"  class="form-control form-control-user @error('status')is-invalid @enderror">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="on_going">On going</option>   
                        <option value="waiting">Waiting </option>
                        <option value="verified">Verified</option>  
                        <option value="finished">Finished</option>  
                    </select>
                    @error('status')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('transaksi.index') }}">Batal</a>
                    <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection
