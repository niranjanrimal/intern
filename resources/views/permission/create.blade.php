@extends('layouts.app')
@section('content')
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermission</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">permissions</div>
            <div>
                <a href="{{ route('permissions.index') }}" class="btn btn-primary">Back</a>
            </div>

        </div>
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('Title') is-invalid @enderror " id="title"
                            name="title" placeholder="Enter title" value="">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Permission Name</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter Name" value="">
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
