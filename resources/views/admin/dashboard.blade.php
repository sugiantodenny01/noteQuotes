@extends('layouts.master')


@section('content')
        @foreach($authors as $author)
            <li>{{$author->name}} {{$author->email}}</li>
        @endforeach

@endsection