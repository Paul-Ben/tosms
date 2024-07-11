@extends('layouts.app')

@section('content')
<div>
    <div class="container">
        <div class="row">
            {{$application->firstname}}
            {{$application->lastname}}
            {{$application->email}}
            {{$application->phone}}
            <img src="{{asset('images/fslc/'. $application->fslc)}}" alt="">
            <img src="{{asset('images/olevel/'. $application->olevel)}}" alt="">

        </div>
        </div>
</div>
@endsection
