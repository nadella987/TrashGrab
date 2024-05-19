@extends('layout.master')
@section('title', 'Edit Driver')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit Driver</strong></h2>
                    </div>
                    <form action="{{ route('driver.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-4">
                    <label for="nama_pegawai">Nama pegawai :</label>
                    <input type="text" id="nama_pegawai" value="{{$driver->nama_pegawai}}" name="nama_pegawai"  class="form-control form-control-user @error('nama_pegawai')is-invalid @enderror" placeholder="Tambahkan nama driver" >
                @error('nama_pegawai')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="email">Email :</label>
                    <input type="text" id="email" value="{{$driver->email}}"  class="form-control form-control-user @error('email')is-invalid @enderror" name="email" placeholder="Tambahkan email" >
                @error('email')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="no_telp">Nomor Telepon :</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{$driver->no_telp}}"  class="form-control form-control-user @error('no_telp')is-invalid @enderror" placeholder="Tambahkan Nomor Telepon" >
                @error('no_telp')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
         
                <div class="form-group mt-4">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"   class="form-control form-control-user @error('jenis_kelamin')is-invalid @enderror">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="perempuan"{{ $driver->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan </option>
                        <option value="laki_laki" {{ $driver->jenis_kelamin == 'laki_laki' ? 'selected' : '' }}>Laki Laki</option>   
                    </select>
                    @error('jenis_kelamin')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="alamat">Alamat :</label>
                    <textarea   class="form-control form-control-user @error('alamat')is-invalid @enderror" id="alamat" name="alamat" rows="5" placeholder="Masukan Alamat">{{$driver->alamat}}</textarea>
                @error('alamat')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('driver.index') }}">Batal</a>
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
