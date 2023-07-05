@extends('layouts.app')
@section('content')
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RoleAndPermission</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Update Users</div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>

        </div>
        <form method="POST" action="{{ route('users.update', $users->id) }}">
            @csrf
            @method('PUT')
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter your name" value="{{ $users->name }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter your email" value="{{ $users->email }}">

                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>

    </div>

    </div>
@endsection
