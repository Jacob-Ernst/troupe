@extends('layouts.master')

@section('header', "<title>$meeting->title</title>")

@section('content')
   
    <div class='text-center'>
        <h1>{{{$meeting->title}}}</h1>
    </div>
        <div class='row'>
                                    <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                        {{ Form::label('title', 'Title:', array('class' => 'input-group-addon')) }}
                                        {{ Form::text('title', Input::old('title') , array('class' => 'form-control')) }}
                                    </div>
                                    <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                        {{ Form::label('type', 'Type:', array('class' => 'input-group-addon')) }}
                                        {{ Form::text('type', Input::old('type') , array('class' => 'form-control')) }}
                                    </div>
                                    <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                        {{ Form::label('summary', 'Summary:', array('class' => '')) }}
                                        {{ Form::textarea('summary', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class='form-group'>
                                        <div class='text-center'>
                                            <h3>Date</h3>
                                        </div>
                                        <div class='col-xs-4'>
                                            <div class='text-center'>
                                                {{ Form::label('d_year', 'Year', array('class' => 'control-label')) }}
                                            </div>
                                            <select class="form-control" id="date-year" name="d_year" required>
                                                
                                                @for ($i=idate('Y'); $i <= (idate('Y') + 5); $i++)
                                                    @if($i == idate('Y'))
                                                        <option selected>{{{ $i }}}</option>
                                                        
                                                    @else
                                                        <option>{{{ $i }}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class='col-xs-4'>
                                            <div class='text-center'>
                                                {{ Form::label('d_month', 'Month', array('class' => 'control-label')) }}
                                            </div>
                                            <select class="form-control" id="date-month" name="d_month" required>
                                                <option>Month</option>
                                                @for ($i=1; $i <= 12; $i++) 
                                                    @if($i == idate('m'))
                                                        <option selected>{{{ $i }}}</option>
                                                        
                                                    @else
                                                        <option>{{{ $i }}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class='col-xs-4'>
                                            <div class='text-center'>
                                                {{ Form::label('d_day', 'Day', array('class' => 'control-label')) }}
                                            </div>
                                            <select class="form-control" id="date-day" name="d_day" required>
                                                <option>Day</option>
                                                @for ($i=1; $i <= 31; $i++) 
                                                    @if($i == idate('d'))
                                                        <option selected>{{{ $i }}}</option>
                                                        
                                                    @else
                                                        <option>{{{ $i }}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class='col-xs-8 col-xs-offset-2' id='script-name-container'>
                                        <h3 id='performace-script-name'></h3>
                                    </div>
                                    <div class='form-group'>
                                        <div class='col-xs-4 col-xs-offset-4'>
                                                <span class="btn btn-primary btn-file file-input btn-block">
                                                    Browse <input type="file" id="script" name='script'/>
                                                </span>
                                            {{-- <input type='file' id="script" name='script' class='file-input'/> --}}
                                        </div>
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="modal-footer">
                                {{Form::submit('Create', array('class' => 'btn btn-default'))}}
                            </div>

@stop
