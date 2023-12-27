@extends('layout.layout');

@section('title', 'Terms')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam vero blanditiis voluptatem quo voluptates
                dignissimos
                cupiditate nobis eos cum quidem.</p>
        </div>
        <div class="col-3">

            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection
