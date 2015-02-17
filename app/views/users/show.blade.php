@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{{$user->first_name}}}</h1>
        <form id="form1" runat="server">
            <input type='file' id="imgInp" />
        </form>
    <button class="btn btn-primary" data-target="#cropping-modal" data-toggle="modal" type="button">Launch the demo</button>
    </div>
    
    <div class='row'>
        <div class="container col-md-6">
            
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
                    {{Form::submit('Login', array('class' => 'btn btn-default'))}}
                </div>
            </div>
          </div>
        </div>
    </div>


@stop

@section('bottom-scripts')

    <script type="text/javascript">
        
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
            }
          });
        }).on("hidden.bs.modal", function() {
          originalData = $image.cropper("getData");
          $image.cropper("destroy");
        });
        
        $("#imgInp").change(function(){
            readURL(this);
            
        });
        
        
    </script>

@stop
