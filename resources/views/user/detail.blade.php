@extends('layout.master')
@section('title', 'Detail User')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Users</strong> </h2>
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
</div>


@endsection

