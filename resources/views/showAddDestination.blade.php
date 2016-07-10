@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

          
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('common.dashboard') }}</div>

                <div class="panel-body">
                    {{ trans('common.dashboardInfo') }} <span class="blueText">{{ Auth::user()->name }}</span>
                </div>
            </div>

            

            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{ trans('destinations.destInfo') }}
                    </a>
                </div>

                <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body" >

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addDestination') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('destinations.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ trans('destinations.country') }}</label>
                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}">
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" style="margin-top:40px;">
                            <label for="description" class="col-md-4 control-label">{{ trans('destinations.description') }}</label>
                            <div class="col-md-6">
                                <textarea cols="4" id="description" class="form-control" name="description" value="{{ old('description') }}"> </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dest_lat') ? ' has-error' : '' }}">
                            <label for="dest_lat" class="col-md-4 control-label">{{ trans('destinations.latitude') }}</label>
                            <div class="col-md-6">
                                <input id="dest_lat" type="text" class="form-control" name="dest_lat" value="{{ old('dest_lat') }}">
                                @if ($errors->has('dest_lat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dest_lat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dest_long') ? ' has-error' : '' }}">
                            <label for="dest_long" class="col-md-4 control-label">{{ trans('destinations.longitude') }}</label>
                            <div class="col-md-6">
                                <input id="dest_long" type="text" class="form-control" name="dest_long" value="{{ old('dest_long') }}">
                                @if ($errors->has('dest_long'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dest_long') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="destinationPhotos form-group{{ $errors->has('dest_long') ? ' has-error' : '' }}" id="destinationPhotos">
                            <label for="dest_photo1" class="col-md-4 control-label">{{ trans('destinations.photo') }} </label>
                            <div class="col-md-4">
                                <input id="dest_photo1" type="file" class="form-control" name="dest_photo1" value="{{ old('dest_photo1') }}">
                                @if ($errors->has('dest_photo1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dest_photo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-info addDestPhoto">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('destinations.addPhoto') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('common.submit') }}
                                </button>
                               </div> 
                        </div>

                        <input name="countPhotos" class="countPhotos" type="hidden" value="1">
                        <input name="hiddenLocale" class="hiddenLocale" type="hidden" 
                               data-value="@if(Session::get('language') == 'en')en @else el @endif" >

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
