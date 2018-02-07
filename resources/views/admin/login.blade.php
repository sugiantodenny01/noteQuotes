@extends('layouts.master')
@section('content')




    <style>
        .input-group label {
            text-align: left;
        }
    </style>

    <header><a href="{{route('index')}}">Home</a></header>
    @if(count($errors)>0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </section>
    @endif

    @if(Session::has('fail'))
        <section class="info-box fail">
            {{Session::get('fail')}}
        </section>
    @endif

    <form method="post" action="{{route('admin.login')}}">
        <div class="input-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name"/>
        </div>

        <div class="input-group">
            <label for="password">Your Email</label>
            <input type="password" name="password" id="password" placeholder="Your Password"/>
        </div>
        <button type="submit">Submit</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token"/>
    </form>

@endsection