<x-backend.layout.master>

    <div class="container">
        <div class="row">
            <form action="{{ route("permission.update", $permission->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <input value="{{ $permission->name }}" type="text" name="name" id="name" placeholder="Enter permission" class="form-control">
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">Update</button>
            </form>
            <div class="role_list border p-3 mt-3">
                <h5>Role</h5>
                @foreach ($permission->roles as $role)
                    <a href="{{ route("role.remove", [$permission->id, $role->id]) }}" class="badge bg-primary">{{ $role->name }}</a>
                @endforeach
            </div>

            <form action="{{ route("role.assign", $permission->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="permission">Give Role</label>
                    <select name="role" id="role" class="form-control">
                        <option selected disabled>Select</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">Assign Role</button>
            </form>
        </div>
    </div>
</x-backend.layout.master>
