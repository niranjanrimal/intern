@extends('layouts.app')
@section('content')
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermission</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Roles</div>
            <div>
                <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
            </div>

        </div>
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror " id="title"
                            name="title" placeholder="Enter your title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter Role" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    </div>
    </div>
@endsection
