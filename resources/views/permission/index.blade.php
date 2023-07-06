@extends('layouts.app')

@section('content')
    {{-- CRUD permissions --}}

    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermissions</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">permissions</div>
            <div>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">create</a>
            </div>

            <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles</a>

            <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
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
                        <th>Title</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($permissions as $permission)
                        <tr valign="middle">
                            <td>{{ $permission->title }}</td>
                            <td>{{ $permission->name }} </td>
                            <td>
                                <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('permissions.destroy', $permission) }}" method="POST"
                                    class="d-inline">
                                    <button class="btn btn-danger ml-2">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>



                        </tr>
                    @endforeach

                </table>


            </div>

        </div>

    </div>
@endsection
