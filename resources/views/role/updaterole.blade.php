<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Update Permissions List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <form action="{{ route('role-has-permission.update') }}" method="post">
                    @csrf
                    @method('PUT')
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
