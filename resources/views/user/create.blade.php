@extends('layouts.app')
@section('content')
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermission</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Users</div>
            <div>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>

        </div>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " id="name"
                            name="name" placeholder="Enter your name" value="">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter your email" value="">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    </div>
    </div>
@endsection
