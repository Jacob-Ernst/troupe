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
                    <div id='performace-modal-dialog' class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('action' => 'PerformancesController@store', 'class' => 'post', 'files' => 'true')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Performance</h3>
                            </div>
                            <div class="modal-body">
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
                                    <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                        {{ Form::label('location', 'Location:', array('class' => '')) }}
                                        {{ Form::textarea('location', null, ['class' => 'form-control']) }}
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
                                    <div class="input-group form-group col-xs-10 col-xs-offset-1">
                                        {{ Form::label('location', 'Location:', array('class' => '')) }}
                                        {{ Form::textarea('location', null, ['class' => 'form-control']) }}
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
                                </div>
                            </div> 
                            <br>
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

@section('bottom-scripts')
    <script type="text/javascript">
    
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });
        
        
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
            
            if(!$('#performace-script-name').html())
            {
                $(this).parent().toggleClass('btn-primary');
                $(this).parent().toggleClass('btn-success');
                
            }
            $('#performace-script-name').html(label);
            ad_height  = $('#script-name-container').height();
            $backdrop  = $('.modal-backdrop');
            el_height  = $('#performace-modal-dialog').innerHeight();
            $backdrop.css({
                height: el_height + ad_height + 30,
            });
        });
    
    
    </script>
@stop
