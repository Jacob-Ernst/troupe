@extends('layouts.master')

@section('content')
   
    <div class='text-center'>
        <h1>{{{ $meeting->title}}}</h1>
        @foreach ($users as $user)
            <h3>{{{$user->first_name}}}</h3>
            <h3>{{{$user->role}}}</h3>
        @endforeach
    </div>

@stop
