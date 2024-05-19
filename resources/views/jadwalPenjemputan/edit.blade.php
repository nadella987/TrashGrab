@extends('layout.master')
@section('title', 'Edit Jadwal Penjemputan')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit Jadwal Penjemputan</strong></h2>
                    </div>
            <form action="{{ route('jadwalPickUp.update', $jadwalPenjemputan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-4">
                    <label for="kode_jadwal">Kode Jadwal :</label>
                    <input type="text" id="kode_jadwal" value="{{$jadwalPenjemputan->kode_jadwal}}" name="kode_jadwal"  class="form-control form-control-user @error('kode_jadwal')is-invalid @enderror" placeholder="Tambahkan jadwal penjemputan" >
                @error('kode_jadwal')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="tanggal">tanggal :</label>
                    <input type="date" id="tanggal" value="{{$jadwalPenjemputan->tanggal}}"  class="form-control form-control-user @error('tanggal')is-invalid @enderror" name="tanggal" placeholder="Tambahkan tanggal" >
                @error('tanggal')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="id_driver">Nama Driver:</label>
                    <select id="id_driver" name="id_driver"   class="form-control form-control-user @error('id_driver')is-invalid @enderror">
                    <option value="" disabled>Pilih Driver</option>
                        @foreach($driver as $item)
                            <option value="{{ $item->id }}" {{ $jadwalPenjemputan->id_driver == $item->id ? 'selected' : '' }}>{{ $item->nama_pegawai }}</option>
                        @endforeach
                    </select>
                    @error('id_driver')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
         
                <div class="form-group mt-4">
                    <label for="id_area">Lokasi:</label>
                    <select id="id_area" name="id_area"   class="form-control form-control-user @error('id_area')is-invalid @enderror">
                        <option value="" disabled selected>Pilih Area</option>
                        @foreach($area as $item)
                            <option value="{{ $item->id }}" {{ $jadwalPenjemputan->id_area == $item->id ? 'selected' : '' }}>{{ $item->lokasi }}</option>
                        @endforeach
                    </select>
                    @error('id_area')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('jadwalPickUp.index') }}">Batal</a>
                    <button type="submit" class="btn btn-primary ml-2">Update</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection
