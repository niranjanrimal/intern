@extends('layouts.app')

@section('content')
    {{-- CRUD Users --}}

    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermissions</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Users</div>
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">create</a>
            </div>
            <a href="{{ route('roles.index') }}" class="btn btn-primary">Goto Roles</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-primary">Goto Permissions</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-stiped">
                    <tr valign="middle">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>Roles</th>
                    </tr>

                    @foreach ($users as $user)
                        <tr valign="middle">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }} </td>
                            <td>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                    <button class="btn btn-danger ml-2">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Create Role
                                </button>
                            </td>

                        </tr>
                    @endforeach

                </table>


            </div>

        </div>

    </div>
@endsection
