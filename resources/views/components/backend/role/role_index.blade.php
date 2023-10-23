<x-backend.layout.master>
    <x-backend.alert.delete_alert />
    <div class="container">
        <a href="{{ route("role.create") }}" class="btn btn-primary btn-sm mb-3">Create Role</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-danger">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route("role.edit", $role->id) }}" class="btn btn-sm btn-warning">edit</a>
                                    <a href="{{ route("role.delete", $role->id) }}" class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-backend.layout.master>
