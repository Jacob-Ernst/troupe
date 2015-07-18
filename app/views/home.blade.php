@extends('layouts.master')

@section('header', "<title>Troupe</title>")

@section('content')

    <div class="jumbotron">
        <h1>home</h1>
    </div>
    <div id='performances' class='home-section'>
        <div class="page-header">
            <h1>Performances <small>Subtext for header</small></h1>
        </div>
        <div class='row'>
            @forelse($performances as $performance)
                <div class="col-xs-12 col-lg-6 container">
                    <h2>{{{ $performance->title}}}</h2>
                    <p class="paragraph">{{{ $performance->brief_summary}}}</p>
                    <p><a class="btn btn-default" href="{{{ action('PerformancesController@show', array($performance->id)) }}}" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
            @empty
            
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/1" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/2" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/3" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/4" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
            @endforelse
        </div>
    </div>
    <div id='meetings' class='home-section'>
        <div class="page-header">
            <h1>Meetings <small>Subtext for header</small></h1>
        </div>
        <div class='row'>
            @forelse($meetings as $meeting)
                <div class="col-xs-12 col-lg-6 container">
                    <h2>{{{ $meeting->title}}}</h2>
                    <p class="paragraph">{{{ $meeting->brief_summary}}}</p>
                    <p><a class="btn btn-default" href="{{{ action('MeetingsController@show', array($meeting->id)) }}}" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
            @empty
            
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/1" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/2" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/3" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
                <div class="col-xs-12 col-lg-6 container">
                    <img class="img-square img-responsive" src="http://lorempixel.com/600/295/people/4" alt="Generic placeholder image">
                    <h2>Heading</h2>
                    <p class="paragraph">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-12.col-lg-6-->
            @endforelse
        </div>
    </div>

@stop
