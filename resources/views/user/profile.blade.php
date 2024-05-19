@extends('layout.master')
@section('title', 'Detail Profile')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="card-title text-dark mb-0">Profile</h2>
                        <a href="{{route('user.editPassword', $user->id)}}" class="btn btn-primary">Update Password</a>
                       
                    </div>
                    <div class="row">
                        <div class="col"> 
                            <strong>Name</strong>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="col">
                            <strong>Username</strong>
                            <p>{{ $user->username }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <strong>Email</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="col">
                            <strong>Nomor Telpon</strong>
                            <p>{{ $user->telp }}</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                            <strong>Role</strong>
                            <p>{{ $user->role }}</p>
                        </div>
                        <div class="col">
                            <strong>Alamat</strong>
                            <p>{{ $user->alamat }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection

