@extends('components.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Create anchor
                </div>
                <div class="card-body">
    <form action="{{route('anchor.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            <div class="invalid-feedback">
                Please provide a valid title.
            </div>
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" id="url" name="url" required>
            <div class="invalid-feedback">
                Please provide a valid URL.
            </div>
        </div>

        <div class="mb-3">
            <label for="ttl" class="form-label">TTL</label>
            <input type="number" class="form-control" id="ttl" name="ttl" min="1" max="86400" required>
            <div class="invalid-feedback">
                Please provide a number between 1 and 86400.
            </div>
        </div>

        <div class="mb-3">
            <label for="max_follow" class="form-label">Max Follow</label>
            <input type="number" class="form-control" id="max_follow" name="max_follow" value="0" min="0" max="99" required>
            <div class="invalid-feedback">
                Please provide a number between 0 and 99.
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
