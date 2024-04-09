@extends('components.base')

@section('page')
    <x-navbar/>
    <div class="container">
        @yield('content')
    </div>
@endsection
