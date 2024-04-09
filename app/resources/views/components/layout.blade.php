@extends('components.base')

@section('page')
    <x-navbar/>
    <div class="container" style="margin-top: 5em">
        @yield('content')
    </div>
@endsection
