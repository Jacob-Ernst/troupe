@extends('layouts.master')

@section('header')

    <title>{{{$user->first_name . ' ' . $user->last_name}}}</title>

@stop

@section('content')
    {{ Form::open(array('action' => 'UsersController@update', 'id' => 'user_form','files' => 'true')) }}
        <div class="page-header">
                <h1>{{{$user->first_name . ' ' . $user->last_name . "'s" . " info"}}}</h1>
        </div>
        <div class='row form-body'>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('first_name', 'First Name', array('class' => 'input-group-addon')) }}
                {{ Form::text('first_name', $user->first_name , array('class' => 'form-control')) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('last_name', 'Last Name', array('class' => 'input-group-addon')) }}
                {{ Form::text('last_name', $user->last_name , array('class' => 'form-control')) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('type', 'Type:', array('class' => 'input-group-addon')) }}
                {{ Form::text('type', $user->type , array('class' => 'form-control')) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('bio', 'Bio:', array('class' => '')) }}
                {{ Form::textarea('bio', $user->bio, ['class' => 'form-control']) }}
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
            <div class="input-group form-group col-xs-8 col-xs-offset-3">
                <h3>Media you work with <small>optional</small></h3>
                <input name="media" id="tags"/>
            </div>
            <div class='col-xs-4 col-xs-offset-4'>
                {{Form::submit('Update', array('class' => 'btn btn-primary file-input btn-block'))}}
            </div>
        </div>
    {{ Form::close() }}
    <p class="hidden" id="hidden-tags">{{{$user->media_tags}}}</p>

@stop

@section('bottom-scripts')
<script type="text/javascript">
    console.log($('#hidden-tags').html());
    $('#tags').importTags();
</script>

@stop
