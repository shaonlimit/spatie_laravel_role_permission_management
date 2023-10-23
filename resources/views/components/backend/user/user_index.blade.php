    <x-backend.layout.master>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($user->permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>

                            <a href="{{ route("user.info", $user->id) }}" class="btn btn-sm btn-primary">info</a>
                            <a href="{{ route("user.delete", $user->id) }}" class="btn btn-sm btn-danger">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-backend.layout.master>
