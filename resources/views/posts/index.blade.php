@extends('layouts.app')
@section('content')
    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermissions</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Roles</div>


            @if (auth()->user()->checkPermission('create_post'))
                <div>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">create</a>
                </div>
            @endif


            {{-- <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-primary">Permissions</a> --}}
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
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
                    @foreach ($posts as $post)
                        <tr valign="middle">
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->name }} </td>
                            <td>
                                @if (auth()->user()->checkPermission('update_post'))
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                                @endif
                                @if (auth()->user()->checkPermission('delete_post'))
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                        <button class="btn btn-danger ml-2">Delete</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
