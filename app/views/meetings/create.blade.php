@extends('layouts.master')

@section('header')

    <title>{{{Input::old('title')}}}</title>

@stop

@section('content')
    {{ Form::open(array('action' => 'MeetingsController@store', 'id' => 'meeting_form','files' => 'true')) }}
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 container" style='max-height: 400px;'>
                
                <img src="http://lorempixel.com/800/450/people" alt="{{{ Input::old('title') . 'photo'}}}" class="img-responsive" id="preview-image" style='max-height: 400px;'>
                
                {{ Form::hidden('x',      'secret', ['id' => 'x']) }}
                {{ Form::hidden('y',      'secret', ['id' => 'y']) }}
                {{ Form::hidden('width',  'secret', ['id' => 'width']) }}
                {{ Form::hidden('height', 'secret', ['id' => 'height']) }}
                {{ Form::checkbox('published', 1, null, ['class' => 'hidden', 'id' => 'published']) }}
            </div>
        </div>
        <div class="col-xs-8 col-xs-offset-2 container">
            <span class="fa fa-pencil fa-2x pull-right btn-file photo-pencil">
                <input type="file" id="script" name='main_photo' id="imgInp"/>
            </span>
        </div>
        <div class="page-header">
                <h1>{{{Input::old('title')}}}</h1>
        </div>
        <div class='row form-body'>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('title', 'Title:', array('class' => 'input-group-addon')) }}
                {{ Form::text('title', Input::old('title') , array('class' => 'form-control')) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('type', 'Type:', array('class' => 'input-group-addon')) }}
                {{ Form::text('type', Input::old('type') , array('class' => 'form-control')) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('brief_summary', 'Summary:', array('class' => '')) }}
                {{ Form::textarea('brief_summary', Input::old('brief_summary'), ['class' => 'form-control']) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('summary', 'Details:', array('class' => '')) }}
                {{ Form::textarea('summary', Input::old('summary'), ['class' => 'form-control']) }}
            </div>
            <div class="input-group form-group col-xs-10 col-xs-offset-1">
                {{ Form::label('location', 'Location:', array('class' => '')) }}
                {{ Form::textarea('location', Input::old('location'), ['class' => 'form-control']) }}
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
                            @if($i == Input::old('d_year'))
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
                            @if($i == Input::old('d_month'))
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
                            @if($i == Input::old('d_day'))
                                <option selected>{{{ $i }}}</option>
                                
                            @else
                                <option>{{{ $i }}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div class='col-xs-4 col-xs-offset-2'>
                {{Form::submit('Save', array('class' => 'btn btn-success btn-submit btn-block', 'id' => 'save_btn'))}}
            </div>
            <div class='col-xs-4'>
                {{Form::submit('Publish', array('class' => 'btn btn-primary btn-submit btn-block', 'id' => 'publish_btn'))}}
            </div>
        </div>
    {{ Form::close() }}


@stop

@section('bottom-scripts')

    <script type="text/javascript">
        
        var $image = $("#preview-image"),
            originalData = {};
        
        function readURL(input) {
            console.log(input.files[0]);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    console.log('.onlad function is firing');
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-image').cropper({
                        multiple: true,
                        aspectRatio: 16 / 9,
                        data: originalData,
                        touchDragZoom: false,
                        preview: "#preview-image",
                        done: function(data) {
                            console.log(data);
                            $('#x').val(data.x);
                            $('#y').val(data.y);
                            $('#width').val(data.width);
                            $('#height').val(data.height);
                        }
                      });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("[name=main_photo]").change(function(){
            originalData = $image.cropper("getData");
            $image.cropper("destroy");
            console.log('changes are happening');
            readURL(this);
        });
        
        $("#save_btn").click(function(event) {
            event.preventDefault();
            $("#published").attr('checked', false);
            $("#meeting_form").submit();
        });
        
        $("#publish_btn").click(function(event) {
            event.preventDefault();
            $("#published").attr('checked', true);
            $("#meeting_form").submit();
        });
        
        
    </script>

@stop
