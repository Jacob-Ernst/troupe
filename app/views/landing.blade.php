@extends('layouts.master')

@section('header', "<title>Troupe</title>")

@section('content')
{{ $errors->first('email',          '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('first_password', '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('last_password',  '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('gender',         '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('b_year',         '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('b_month',        '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('b_date',         '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}
{{ $errors->first('type',           '<div class="alert alert-danger" role="alert"><span class="help-block">:message</span></div>')}}


    <div class="jumbotron magenta row">
        <div class='text-center col-xs-10 col-xs-offset-1'>
            <h1>Welcome!</h1>
        </div>
        
        <div class='col-xs-10 col-xs-offset-1'>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class='col-xs-8 col-xs-offset-2'>
            <div class='text-center'>
                <button  data-toggle="modal" data-target="#modal-sign_up" type="button" class="btn btn-default btn-lg search-btn" data-dismiss="modal">Sign Up</button>
            </div>
        </div> 
        
    </div>
    
    <!-- --------------------- Modal for sign up --------------------- -->

        <div class="container">
            <div id="modal-sign_up" class="modal fade lg" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{ Form::open(array('action' => 'UsersController@store')) }}                        
                        <div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Sign Up</h3>
                        </div>
                        <div class="modal-body">
                            <div class='row'>
                                <div class='text-center'>
                                    <h3>Name</h3>
                                </div>
                                <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                    {{ Form::label('first_name', 'First:', array('class' => 'input-group-addon')) }}
                                    {{ Form::text('first_name', Input::old('first_name') , array('class' => 'form-control')) }}
                                </div>  
                                <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                    {{ Form::label('last_name', 'Last:', array('class' => 'input-group-addon')) }}
                                    {{ Form::text('last_name', Input::old('last_name') , array('class' => 'form-control')) }}
                                </div>
                                
                                <div class='text-center'>
                                    <h3>Email</h3>
                                </div>
                                <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                    {{ Form::label('email', 'Email:', array('class' => 'input-group-addon')) }}
                                    {{ Form::text('email', Input::old('email') , array('class' => 'form-control')) }}
                                </div>
                                
                                <div class='text-center'>
                                    <h3>Password</h3>
                                </div>
                                <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                    {{ Form::label('first_password', 'Password', array('class' => 'input-group-addon')) }}
                                    {{ Form::password('first_password', array('class' => 'form-control', 'value' => "Input::old('last_password')")) }}
                                </div>  
                                <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                    {{ Form::label('last_password', 'Retype Password', array('class' => 'input-group-addon')) }}
                                    {{ Form::password('last_password', array('class' => 'form-control', 'value' => "Input::old('last_password')")) }}
                                </div>
                                                      
                                <div class="input-group form-group col-xs-4 col-xs-offset-4">
                                    <div class='text-center'>
                                        <h3>gender</h3>
                                    </div>
                                        
                                    <div class='v_radio'>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'm') }} male
                                        </label>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'f') }} female
                                        </label>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'o') }} other
                                        </label>
                                        <label class="radio">
                                            {{ Form::radio('gender', 'p') }} prefer not to say
                                        </label>
                                    </div>
                                    
                                </div>
                                
                                <div class='form-group'>
                                    <div class='text-center'>
                                        <h3>Date of Birth</h3>
                                    </div>
                                    <div class='col-xs-4'>
                                        <select class="form-control" id="bday-year" name="b_year" required>
                                            <option selected>Year</option>
                                            @for ($i=idate('Y'); $i >= (idate('Y') - 50); $i--)
                                                <option>{{{ $i }}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class='col-xs-4'>
                                        <select class="form-control" id="bday-month" name="b_month" required>
                                            <option>Month</option>
                                            @for ($i=1; $i <= 12; $i++) 
                                                <option>{{{ $i }}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class='col-xs-4'>
                                        <select class="form-control" id="bday-day" name="b_date" required>
                                            <option>Day</option>
                                            @for ($i=1; $i <= 31; $i++) 
                                                <option>{{{ $i }}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="input-group form-group col-xs-4 col-xs-offset-4 text-center">
                                    <h3>type</h3>
                                    {{ Form::select('type', array('type', 'director' => 'director', 'actor' => 'actor', 'writer' => 'writer', 'artist' => 'artist'), null, ['class' => 'form-control', 'required']) }}
                                </div>
                                
                                <div class="input-group form-group col-xs-8 col-xs-offset-3">
                                    <h3>Media you work with <small>optional</small></h3>
                                    <input name="media" id="tags"/>
                                </div>
                            </div>
                        </div> 
                        <div class="modal-footer">
                            {{Form::submit('Done', array('class' => 'btn btn-default'))}}
                        </div>
                        {{ Form::close() }}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dalog -->
            </div><!-- /.modal -->
        </div>
    <!-- --------------------- Modal end --------------------- -->
@stop
