@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row align-items-center" style="background: #32383E; border-radius: 15px 15px 15px 15px;">

            <div class="col-3 p-0">
                 <img src="{{ $user->avatar }}" alt="User avatar">
            </div>

            <div class="col p-0">
                <h1><strong>{{ $user->name }}</strong> </h1>
                <p><span class="pr-3">Likes: <strong> NaN </strong></span> <span class="pr-3">Submits: <strong> {{ $allmedia->count() }} </strong></span> Registered: <strong>{{ $user->created_at->diffForHumans() }} </strong> </p>
            </div>
        </div>


{{--        <div class="row pt-4 d-flex justify-content-center">--}}
{{--            <div class="btn-group btn-group-toggle" data-toggle="buttons">--}}
{{--                <a class="btn btn-secondary active">Submits</a>--}}
{{--                <a class="btn btn-secondary">Likes</a>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="row mt-4">
            <div class="col">
                @include('grid')
            </div>


        </div>
    </div>

@endsection
