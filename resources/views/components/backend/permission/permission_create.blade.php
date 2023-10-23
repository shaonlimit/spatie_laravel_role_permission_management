<x-backend.layout.master>
    <div class="container">
        <div class="row">
            <form action="{{ route("permission.store") }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <input type="text" name="name" id="name" placeholder="Enter permission" class="form-control">
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3">Create</button>
            </form>
        </div>
    </div>
</x-backend.layout.master>
