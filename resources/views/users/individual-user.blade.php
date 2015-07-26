@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                <h1><i class="fa fa-fw fa-user"></i> {{ $user->name }}

                    @unless ( auth()->user()->id == $user->id )
                    <div class="pull-right">

                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default"><i class="fa fa-fw fa-user-plus"></i> Add Friend</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-fw fa-paper-plane"></i> Send Message</button>
                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-fw fa-smile-o"></i> Smile</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-fw fa-flag-o"></i> Report</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-ban"></i> Block</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endunless

                </h1>


            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                @if ( $user->statuses()->count() )

                @foreach ( $user->statuses as $status )

                    @include('statuses.partials._individual')

                @endforeach

                @else

                    <div class="panel panel-default"><div class="panel-body">
                            <div class="text-center">No Updates Yet.</div>
                        </div></div>

                @endif

                <div class="row">
                    <div class="col-xs-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection