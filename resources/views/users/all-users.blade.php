@extends('layouts.master')

@section('header')
    <style>

        .profile-card {
            background: white;
            border-radius: 5px;
            margin: 20px auto;
            padding: 0;
            box-shadow: 0 1px 3px #ccc;
        }

        .profile-card img.profile-photo {
            width: 100%;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .profile-card-header {
            padding: 0;
        }

        .profile-card-body {
            padding: 0 20px 20px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                <h1><i class="fa fa-fw fa-users"></i> All Users</h1>

                @foreach ( array_chunk($users->all(), 3) as $rowOfUsers )
                    <div class="row">
                        @foreach ( $rowOfUsers as $user )
                            <a href="/&#64;{{ $user->profile->username }}">
                            <div class="col-sm-4">
                                <div class="profile-card">
                                    <div class="profile-card-header">
                                        <img src="{{ $user->profile->photo_url }}" alt="" class="profile-photo">
                                    </div>
                                    <div class="profile-card-body">

                                        <h4>{{ $user->name }} <span class="pull-right">{{ $user->friends()->count() }}</span></h4>
                                        <a href="https://facebook.com/{{ $user->profile->facebook_username }}"><i class="fa fa-fw fa-facebook"></i></a>
                                        <a href="https://twitter.com/&#64;{{ $user->profile->twitter_username }}"><i class="fa fa-fw fa-twitter"></i></a>
                                        @if ( auth()->check() && auth()->user()->id != $user->id )
                                            <span class="pull-right">
                                                <form action="/&#64;{{ $user->profile->username }}/add" method="POST">{!! csrf_field() !!}<button class="btn-link" type="submit"><i class="fa fa-fw fa-user-plus"></i></button></form>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        @endforeach
                    </div>

                @endforeach

                {!! $users->render() !!}


            </div>
        </div>
    </div>
@endsection