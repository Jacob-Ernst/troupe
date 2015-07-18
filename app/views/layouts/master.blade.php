<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @yield('header')

        <!-- Bootstrap -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/troupe.css" />
        <link rel="stylesheet" type="text/css" href="/slick-1.3.15/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
        <link  href="/dist/cropper.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- standard heading -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand orange" href="{{{ action('HomeController@showHome') }}}">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
              <form class="navbar-form navbar-left" role="search" method='GET' action="#">
                  <input type="text" id='search' name='search'class="form-control" placeholder="Search">
                
              </form>
              <ul class="nav navbar-nav navbar-right">
                
                  @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{{Auth::user()->first_name}}} {{{Auth::user()->last_name}}}<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{{ action('UsersController@show', array(Auth::user()->id)) }}}">Profile</a></li>
                            @if(Auth::user()->role == 'organizer' || Auth::user()->role == 'admin')
                                <li><a href="{{{ action('HomeController@showAdmin') }}}">Admin</a></li>
                            @endif
                            <li class="divider"></li>
                            <li><a href="{{{ action('HomeController@doLogout') }}}">Logout</a></li>
                        </ul>
                    </li>    
                  @else
                    <li><a data-toggle="modal" type="button" data-target="#modal-login" id="about" class="btn btn-lg">Login</a></li>
                  @endif
              </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        
        <div class= 'container'>
            <div class='row'>
                <div class='col-md-8 col-md-offset-2'>
                    @if (Session::has('successMessage'))
                        <div class="alert alert-success alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{{ Session::get('successMessage') }}}</div>
                    @endif
                    @if (Session::has('errorMessage'))
                        <div class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{{ Session::get('errorMessage') }}}</div>
                    @endif
                    @if (Session::has('warningMessage'))
                        <div class="alert alert-warning alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{{ Session::get('warningMessage') }}}</div>
                    @endif
                    @if (Session::has('infoMessage'))
                        <div class="alert alert-info alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{{ Session::get('infoMessage') }}}</div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class= 'container'>
            <div class='row'>
                <div class='col-xs-10 col-xs-offset-1'>
                    @yield('content')
                </div>
            </div>
            @yield('content-no-offset')
        </div>
        <!-- --------------------- Modal for login --------------------- -->

            <div class="container">
                <div id="modal-login" class="modal fade lg" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'post')) }}                        
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3>Login</h3>
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

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/slick-1.3.15/slick/slick.min.js"></script>
        <script src="/js/jquery.tagsinput.min.js"></script>
        <script src="/dist/cropper.js"></script>
        <script src="/bootstrap-switch-master/dist/js/bootstrap-switch.js"></script>
        <script type="text/javascript">
            $('.carousel').slick({
                dots: true
            });
            $('#tags').tagsInput();
            setTimeout(function() {
                $('.alert').alert('close');
            }, 3000);
        </script>
        @yield('bottom-scripts')
    </body>
</html>
