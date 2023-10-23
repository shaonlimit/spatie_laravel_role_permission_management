<x-backend.layout.master>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>User Details</p>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong>
                            @foreach ($user->roles as $role)
                                <a href="{{ route("user.role.delete", [$user->id, $role->id]) }}" class="badge bg-primary">{{ $role->name }}</a>
                            @endforeach
                        </p>
                        <p><strong>Permission:</strong>
                            @foreach ($user->permissions as $permission)
                                <a href="{{ route("user.permission.delete", [$user->id, $permission->id]) }}" class="badge bg-primary">{{ $permission->name ?? "" }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>Assign Role</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("user.role.assign", $user->id) }}" method="POST">
                            @csrf
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-success mt-3">Assign Role</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p>Assign Permissions</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("user.permission.assign", $user->id) }}" method="POST">
                            @csrf
                            <select name="permission" id="permission" class="form-control">
                                <option selected disabled>Select</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-success mt-3">Assign Permission</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-backend.layout.master>
