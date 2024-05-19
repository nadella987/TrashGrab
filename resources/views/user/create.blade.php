@extends('layout.master')
@section('title', 'Tambah User')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Tambah User</strong></h2>
                    </div>
                    <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group mt-4">
                    <label for="name">Nama :</label>
                    <input type="text" id="name" name="name"  class="form-control form-control-user @error('name')is-invalid @enderror" placeholder="Tambahkan nama user" >
                @error('name')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="username">Username :</label>
                    <input type="text" id="username"   class="form-control form-control-user @error('username')is-invalid @enderror" name="username" placeholder="Tambahkan username" >
                @error('username')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email"   class="form-control form-control-user @error('email')is-invalid @enderror" placeholder="Tambahkan email" >
                @error('email')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="telp">Nomor Telepon :</label>
                    <input type="text" id="telp" name="telp"   class="form-control form-control-user @error('telp')is-invalid @enderror" placeholder="Tambahkan Nomor Telepon" >
                @error('telp')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                 <div class="form-group mt-4">
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password"   class="form-control form-control-user @error('password')is-invalid @enderror" placeholder="Tambahkan password" >
                @error('password')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="confirmation_password">Konfirmasi Password :</label>
                    <input type="password" id="confirmation_password" name="confirmation_password"   class="form-control form-control-user @error('confirmation_password')is-invalid @enderror" placeholder="Tambahkan confirmation password" >
                @error('confirmation_password')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>
         
                <div class="form-group mt-4">
                    <label for="role">Role:</label>
                    <select id="role" name="role"   class="form-control form-control-user @error('role')is-invalid @enderror">
                        <option value="" disabled selected>Pilih role</option>
                        <option value="admin">Admin </option>
                        <option value="member">Member</option>   
                    </select>
                    @error('role')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="form-group mt-4">
                    <label for="alamat">Alamat :</label>
                    <textarea   class="form-control form-control-user @error('alamat')is-invalid @enderror" id="alamat" name="alamat" rows="5" placeholder="Masukan Alamat"></textarea>
                @error('alamat')
                    <span class="invalid-feedback"> {{$message}}</span>
                @enderror
                </div>

                <div class="row justify-content-end">
                    <a class="btn btn-danger" href="{{ route('user.index') }}">Batal</a>
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
