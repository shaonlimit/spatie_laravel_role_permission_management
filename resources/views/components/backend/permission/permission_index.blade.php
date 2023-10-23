<x-backend.layout.master>
    <x-backend.alert.delete_alert />
    <div class="container">
        <a href="{{ route("permission.create") }}" class="btn btn-primary btn-sm mb-3">Create permission</a>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Permission</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @foreach ($permission->roles as $role)
                                        <span class="badge bg-info">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route("permission.edit", $permission->id) }}" class="btn btn-sm btn-warning">edit</a>
                                    <a href="{{ route("permission.delete", $permission->id) }}" class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-backend.layout.master>
