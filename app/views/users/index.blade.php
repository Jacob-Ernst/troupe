@extends('layouts.master')

@section('header', "<title>Find Users</title>")

@section('content')

    
        <div class='row'>
        <h1 class='text-center'>Find Users</h1>
            @foreach ($users as $user)
                <div class="col-xs-6 col-lg-4 container text-center">
                    <a href="/users/{{{ $user->id}}}">
                        @if ($user->avi)
                            <img src="{{ $user->avi }}" alt="{{{ $user->first_name }}} {{{ $user->last_name }}}" class="img-responsive img-circle">
                        @else
                            <img src="http://lorempixel.com/295/295/people/{{ mt_rand(1, 10) }}" alt="{{{ $user->first_name }}} {{{ $user->last_name }}}" class="img-responsive img-circle">
                        @endif
                        <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                    </a>
                </div>
            @endforeach
            <div class='col-md-8 col-md-offset-2'>
                <div class="text-center">{{ $users->links() }}</div>
                <div class='text-center'>
                    <button  data-toggle="modal" data-target="#modal-search" type="button" class="btn btn-default btn-lg search-btn filter-btn" data-dismiss="modal">Filter</button>
                </div>
            </div>    
        </div>
    
    <!-- --------------------- Modal for search --------------------- -->

            <div class="container">
                <div id="modal-search" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('url' => '/users', 'method' => 'get')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Find Users</h3>
                            </div>
                            <div class="modal-body">
                                <div class='row'>
                                    <div class="input-group form-group col-md-10 col-md-offset-1">
                                        {{ Form::label('name', 'Name:', array('class' => 'input-group-addon')) }}
                                        {{ Form::text('name', Input::old('name') , array('class' => 'form-control')) }}
                                    </div>  
                                                          
                                    <div class="input-group form-group col-md-2 col-md-offset-5">
                                        <h3>gender</h3>
                                        <label class="checkbox">
                                            {{ Form::checkbox('male', 'm') }} male
                                        </label>
                                        <label class="checkbox">
                                            {{ Form::checkbox('female', 'f') }} female
                                        </label>
                                        <label class="checkbox">
                                            {{ Form::checkbox('other', 'o') }} other
                                        </label>
                                        <label class="checkbox">
                                            {{ Form::checkbox('not_given', 'p') }} not given
                                        </label>
                                    </div>
                                    
                                    <div class="input-group form-group col-md-2 col-md-offset-5">
                                        <h3>type</h3>
                                        {{ Form::select('type', array('none' => 'none', 'director' => 'director', 'actor' => 'actor', 'writer' => 'writer', 'artist' => 'artist')) }}
                                    </div>
                                    
                                    <div class="input-group form-group col-md-8 col-md-offset-3">
                                        <input name="media" id="tags"/>
                                    </div>
                                </div>
                            </div> 
                            <div class="modal-footer">
                                {{Form::submit('Filter', array('class' => 'btn btn-default'))}}
                            </div>
                            {{ Form::close() }}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dalog -->
                </div><!-- /.modal -->
            </div>
        <!-- --------------------- Modal end --------------------- -->
    
@stop
