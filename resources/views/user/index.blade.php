@extends('layouts.app')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Role List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">

                    <form action="{{ route('user-has-role.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="">
                        <ul>
                            @foreach ($roles as $role)
                                <li>
                                    <input type="checkbox" class="roles" name="roles[]" value="{{ $role->id }}">
                                    {{ $role->name }}
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

                                <button data-id="{{ $user->id }}" type="button"
                                    class="btn btn-outline-success btn-sm permission_button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Roles
                                </button>

                            </td>

                            <td>

                            </td>

                        </tr>
                    @endforeach

                </table>

            </div>

        </div>

    </div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).on('click', '.permission_button', function(e) {
        var user_id = $(this).attr('data-id');
        $('#exampleModal').find('input[name="user_id"]').val(user_id);
        let route = "{{ route('get-user-roles', ':id') }}";
        route = route.replace(':id', user_id);
        $.ajax({
            type: "get",
            url: route,
            data: {
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('.roles').each(function(i, ele) {
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
