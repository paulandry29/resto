@extends('layout.app')

@section('content')
    <h1>{{$title}}</h1>
    <h4>{{$description}}</h4>
    <ul>
        @if(count($services) > 0)
            @foreach ($services as $service)
                <li>{{$service}}</li>
            @endforeach
        @endif
    </ul>
@endsection