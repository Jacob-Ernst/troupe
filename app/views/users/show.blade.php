@extends('layouts.master')

@section('header')

    <title>{{ $user->first_name }} {{ $user->last_name }}</title>

@stop

@section('content-no-offset')
    <div class="container target">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 col-md-2 col-md-offset-0">
            <a href="/users">
                @if ($user->avi)
                    <img title="profile image" class="img-circle img-responsive" src="{{{$user->avi}}}">
                @else
                    <img src="http://lorempixel.com/165/165/people" alt="{{{ $user->first_name }}} {{{ $user->last_name }}}" class="img-responsive img-circle">
                @endif
            </a>
            @if (Auth::user()->id == $user->id)
                {{ Form::open(array('action' => 'UsersController@uploadAvi', 'id' => 'form1', 'class' => 'hidden', 'files' => 'true')) }}
                    <input type='file' id="imgInp" name='image'/>
                    {{ Form::hidden('x', 'secret', ['id' => 'x']) }}
                    {{ Form::hidden('y', 'secret', ['id' => 'y']) }}
                    {{ Form::hidden('width', 'secret', ['id' => 'width']) }}
                    {{ Form::hidden('height', 'secret', ['id' => 'height']) }}
                {{ Form::close() }}
                <a href="#" id='avi-pencil'>
                    <i class="fa fa-pencil fa-2x pull-right"></i>
                </a>
            @endif
        </div>
        <div class="col-xs-8 col-xs-offset-2 col-md-12 col-md-offset-0">
             <h1 class="">{{{$user->first_name}}} {{{$user->last_name}}}</h1>
         
          <a class="btn btn-success" href="mailto:{{{$user->email}}}">Email me!</a>
        <br>
        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Age</strong></span> {{{$user->date_of_birth->age}}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Birthday</strong></span> {{{$user->date_of_birth->toFormattedDateString()}}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender</strong></span> {{{$user->gender}}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Type: </strong></span> {{{$user->type}}}</li>
            </ul>
           {{-- <div class="panel panel-default">
             <div class="panel-heading">Insured / Bonded?

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i> Yes, I am insured and bonded.

                </div>
            </div> --}}
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://google.com" class="">google.com</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Shares</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Posts</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Followers</strong></span> 78</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">Social Media</div>
                <div class="panel-body">    <i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i> 
                    <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  <i class="fa fa-google-plus fa-2x"></i>

                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
            <div class="panel panel-default">
                <div class="panel-heading">About me</div>
                <div class="panel-body"> 
                    <p>{{{$user->bio}}}</p>
                </div>
            </div>
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Performances</div>
                <div class="panel-body">
                  <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/people">
                        <div class="caption">
                            <h3>
                                Hamlet
                            </h3>
                            <p>
                                A son avenges his father's murder, but his madness and indecision take its toll on everyone.
                            </p>
                            <p>
                            
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/city">
                        <div class="caption">
                            <h3>
                                Macbeth
                            </h3>
                            <p>
                                A Scottish soldier (Macbeth) and his friend (Banquo) are met by three strange witches bearing prophetic greetings. Macbeth is told that,among other titles, he will become king. The rest of the play follows a once loyal soldier (Macbeth) into the depths of darkness and despair as he seeks the crown regardless of the consequences.
                            </p>
                            <p>
                            
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/sports">
                        <div class="caption">
                            <h3>
                                Rocky
                            </h3>
                            <p>
                                Me have eye of the tiger. Fight me.
                            </p>
                            <p>
                            
                            </p>
                        </div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
           <div class="panel panel-default">
                <div class="panel-heading">Preferred media</div>
                <div class="panel-body"> 
                    @forelse($user->media as $medium)
                        <p>{{ $medium->medium }}</p>
                    @empty
                        <p>Nunca Nada</p>
                    @endforelse
                </div>
</div>

    <div class="container">
        <div class="modal fade lg" id="cropping-modal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Crop</h3>
                </div>
                <div class="modal-body">
                  <div class="cropping-modal-cropper">
                    <img id="blah" src="#" alt="your image" class="img-responsive" style='max-height: 250px;'/>
                  </div>
                </div>
                <div class="modal-footer">
                    <button class='btn btn-default' id='upload-btn'>upload</button>
                </div>
            </div>
          </div>
        </div>
    </div>
    
    


@stop

@section('bottom-scripts')

    <script type="text/javascript">
        
        $("#avi-pencil").on( "click", function() {
            $(this).toggleClass('hidden');
            $("#form1").toggleClass('hidden');
        });
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $('#cropping-modal').modal();
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        var $image = $(".cropping-modal-cropper > img"),
            originalData = {};

        $("#cropping-modal").on("shown.bs.modal", function() {
          $image.cropper({
            multiple: true,
            aspectRatio: 1 / 1,
            data: originalData,
            done: function(data) {
                console.log(data);
                $('#x').val(data.x);
                $('#y').val(data.y);
                $('#width').val(data.width);
                $('#height').val(data.height);
            }
          });
        }).on("hidden.bs.modal", function() {
          originalData = $image.cropper("getData");
          $image.cropper("destroy");
        });
        
        $('#upload-btn').click(function() {
            $('#form1').submit();
        });
        
        $("#imgInp").change(function(){
            readURL(this);
            
        });
        
        
    </script>

@stop
