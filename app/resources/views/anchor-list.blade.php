@extends('components.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h2>Anchor List</h2>
                </div>
                <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">URL</th>
                <th scope="col">Link</th>
                <th scope="col">TTL</th>
                <th scope="col">Max Follow</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($anchors as $anchor)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $anchor->title }}</td>
                    <td><a href="{{ $anchor->url }}" target="_blank">{{ $anchor->url }}</a></td>
                    <td><a href="{{ $anchor->link }}" target="_blank">{{ $anchor->link }}</a></td>
                    <td>{{ $anchor->ttl }}</td>
                    <td>{{ $anchor->max_follow }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
@endsection()
