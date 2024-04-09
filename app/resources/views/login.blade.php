@extends('components.base')

@section('page')
    <div class="row justify-content-center mt-10">
        <div class="col-3" style="margin: 10em">
            <div class="card">
                <div class="card-header bg-warning bg-gradient justify-content-center d-flex">
                    <strong>Authentication</strong>
                </div>
                <div class="card-body px-5 bg-light">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
{{--                        <div class="mb-3 form-check">--}}
{{--                            <input type="checkbox" class="form-check-input" id="remember" name="remember">--}}
{{--                            <label class="form-check-label" for="remember">Remember me</label>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
