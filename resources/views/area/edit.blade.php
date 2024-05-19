@extends('layout.master')
@section('title', 'Edit Area')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit Area</strong></h2>
                    </div>
                    <form action="{{ route('area.update', $area->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-4">
                    <label for="kode_area">Kode Area:</label>
                    <input type="text" id="kode_area" value="{{$area->kode_area}}" name="kode_area"  class="form-control form-control-user @error('kode_area')is-invalid @enderror" placeholder="Tambahkan nama driver" >
                @error('kode_area')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="lokasi">Lokasi :</label>
                    <textarea   class="form-control form-control-user @error('lokasi')is-invalid @enderror" id="lokasi" name="lokasi" rows="5" placeholder="Masukan lokasi">{{$area->lokasi}}</textarea>
                @error('lokasi')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('area.index') }}">Batal</a>
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
