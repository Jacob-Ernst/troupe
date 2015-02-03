@extends('layouts.master')

@section('header', "<title>Troupe</title>")

@section('content')

    <div class="jumbotron magenta">
        <h1>Welcome!</h1>
        <div class="carousel">
            @foreach ($users as $user)
                <div class='text-center azure'><p>{{{$user->first_name}}}</p></div>
            @endforeach
        </div>
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>
                <div class='text-center'>
                    <button type="button" class="btn btn-default btn-lg search-btn" data-dismiss="modal">&times;</button>
                </div>
            </div>    
        </div>
    </div>
    <a data-toggle="modal" type="button" data-target="#modal-search" class="btn btn-lg">Post</a>
    
    
    <!-- --------------------- Modal for search --------------------- -->

            <div class="container">
                <div id="modal-search" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('url' => 'troupe.dev/users', 'method' => 'get')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Find Users</h3>
                            </div>
                            <div class="modal-body">
                                <div class="input-group form-group">
                                    {{ Form::label('email', 'Email:', array('class' => 'input-group-addon')) }}
                                    {{ Form::text('email', Input::old('email') , array('class' => 'form-control')) }}
                                </div>                        
                                <div class="input-group form-group">
                                    {{ Form::label('password', 'Password:', array('class' => 'input-group-addon')) }}
                                    {{ Form::password('password', array('class' => 'form-control')) }}
                                </div>
                            </div> 
                            <div class="modal-footer">
                                {{Form::submit('Login', array('class' => 'btn btn-default'))}}
                            </div>
                            {{ Form::close() }}
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dalog -->
                </div><!-- /.modal -->
            </div>
        <!-- --------------------- Modal end --------------------- -->
    
@stop
