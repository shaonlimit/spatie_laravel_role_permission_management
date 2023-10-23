<x-backend.layout.master>

    <div class="container">
        <div class="row">
            <form action="{{ route("role.update", $role->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <input value="{{ $role->name }}" type="text" name="name" id="name" placeholder="Enter role" class="form-control">
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">Update</button>
            </form>
            <div class="border my-3 p-3">
                <h5>Permission List</h5>

                @foreach ($role->permissions as $permission)
                    <a href="{{ route("permission.revoke", [$role->id, $permission->id]) }}" class="badge bg-danger">{{ $permission->name }}</a>
                @endforeach

            </div>
            <form action="{{ route("permission.assign", $role->id) }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="permission">Give Permission</label>
                    <select name="permission" id="permission" class="form-control">
                        <option selected disabled>Select</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">Assign Permission</button>
            </form>
        </div>
    </div>
</x-backend.layout.master>
