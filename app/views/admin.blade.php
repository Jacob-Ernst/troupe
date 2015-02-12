@extends('layouts.master')

@section('header', "<title>Admin</title>")

@section('content')

    <div class="jumbotron row">
        <div class='text-center'>
            <h1>admin</h1>
        </div>
        <div class='col-xs-8 col-xs-offset-2'>
            <div class='text-center'>
                <button  data-toggle="modal" data-target="#modal-performance" type="button" class="btn btn-default btn-lg search-btn" data-dismiss="modal">Create Performance</button>
            </div>
        </div>
        <div class='col-xs-8 col-xs-offset-2'>
            <div class='text-center'>
                <button  data-toggle="modal" data-target="#modal-event" type="button" class="btn btn-default btn-lg search-btn" data-dismiss="modal">Create Event</button>
            </div>
        </div>
        <div class='col-xs-8 col-xs-offset-2'>
            <div class='text-center'>
                <button  data-toggle="modal" data-target="#modal-announcement" type="button" class="btn btn-default btn-lg search-btn" data-dismiss="modal">Create Announcement</button>
            </div>
        </div>
    </div>
    
    
    <!-- --------------------- Modal for Performance --------------------- -->

            <div class="container">
                <div id="modal-performance" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'post')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Performance</h3>
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
        
        <!-- --------------------- Modal for Event --------------------- -->

            <div class="container">
                <div id="modal-event" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'post')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Event</h3>
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
        
        <!-- --------------------- Modal for Announcement --------------------- -->

            <div class="container">
                <div id="modal-announcement" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'post')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Announcement</h3>
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
