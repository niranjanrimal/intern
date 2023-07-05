@extends('layouts.app')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Permissions List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">

                    <form action="{{ route('role-has-permission.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="role_id" value="">
                        <ul>
                            @foreach ($permissions as $permission)
                                <li>
                                    <input type="checkbox" class="permissions" name="permissions[]"
                                        value="{{ $permission->id }}">
                                    {{ $permission->name }}
                                </li>
                            @endforeach

                        </ul>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark py-3">
        <div class="container">
            <h1 class="text-white">RolesAndPermissions</h1>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Roles</div>
            <div>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">create</a>
            </div>
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
                        <th>Status</th>
                    </tr>

                    @foreach ($roles as $role)
                        <tr valign="middle">
                            <td>{{ $role->title }}</td>
                            <td>{{ $role->name }} </td>
                            <td>
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                    <button class="btn btn-danger ml-2">Delete</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <!-- Button trigger modal -->
                                <button data-id="{{ $role->id }}" type="button"
                                    class="btn btn-outline-success btn-sm permission_button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Permissions
                                </button>

                            </td>
                            <td>ON/OFF</td>

                        </tr>
                    @endforeach

                </table>


            </div>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '.permission_button', function(e) {
            var role_id = $(this).attr('data-id');
            $('#exampleModal').find('input[name="role_id"]').val(role_id);
            let route = "{{ route('get-role-permissions', ':id') }}";
            route = route.replace(':id', role_id);
            $.ajax({
                type: "get",
                url: route,
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('.permissions').each(function(i, ele) {
                        let checkBoxVal = parseInt($(ele).attr('value'));
                        if ($.inArray(checkBoxVal, response) !== -1) {
                            console.log(checkBoxVal);
                            $(ele).attr('checked', 'checked');
                        } else {
                            console.log(checkBoxVal);
                        }
                    });
                }
            });

        });
    </script>
@endsection
