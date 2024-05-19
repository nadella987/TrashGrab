@extends('layout.master')
@section('title', 'Edit Sampah')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit Sampah</strong></h2>
                    </div>
                    <form action="{{ route('katalogSampah.update', $katalogSampah->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mt-4">
                    <label for="jenis_sampah">Jenis Sampah :</label>
                    <input type="text" id="jenis_sampah" value="{{$katalogSampah->jenis_sampah}}" class="form-control form-control-user @error('jenis_sampah')is-invalid @enderror" name="jenis_sampah" placeholder="Tambahkan Jenis Sampah" >
                @error('jenis_sampah')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="foto">Gambar :</label>
                    <input type="file" id="foto" name="foto" value="{{$katalogSampah->foto}}" class="form-control form-control-user @error('foto')is-invalid @enderror" placeholder="Tambahkan Gambar" >
                @error('foto')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="harga">Harga:</label>
                    <input type="text" id="harga" value="{{$katalogSampah->harga}}"  class="form-control form-control-user @error('harga')is-invalid @enderror" name="harga" placeholder="Tambahkan Harga" >
                @error('harga')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
         
                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('driver.index') }}">Batal</a>
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
