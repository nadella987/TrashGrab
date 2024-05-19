@extends('layout.master')
@section('title', 'Edit User')
@section('content')

@auth
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Edit User</strong></h2>
                    </div>
                    <form action="{{ route('user.updatePassword', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-4">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Tambahkan password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="password_confirmation">Konfirmasi Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" placeholder="Tambahkan confirmation password">
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row justify-content-end">
                            <a class="btn btn-danger" href="{{ route('user.index') }}">Batal</a>
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
