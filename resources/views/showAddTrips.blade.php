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
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        {{ trans('trips.tripsInfo') }}
                    </a>
                </div>

                <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addTripPackage') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="domains" class="col-md-4 control-label">{{ trans('trips.domains') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="domains" name="domains">
                                    @foreach ($domains as $domain)
                                      <option value="{{$domain->id}}">{{$domain->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trip_package') ? ' has-error' : '' }}">
                            <label for="trip_package" class="col-md-4 control-label">{{ trans('trips.tripPackage') }}</label>
                            <div class="col-md-6">
                                <input id="trip_package" type="text" class="form-control" name="trip_package" value="{{ old('trip_package') }}">
                                @if ($errors->has('trip_package'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trip_package') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">{{ trans('trips.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" style="margin-top:40px;">
                            <label for="description" class="col-md-4 control-label">{{ trans('trips.description') }}</label>
                            <div class="col-md-6">
                                <textarea cols="4" id="description" class="form-control" name="description" value="{{ old('description') }}"> </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">{{ trans('trips.duration') }}</label>
                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{ old('duration') }}">
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('destinations') ? ' has-error' : '' }}">
                            <label for="destinations" class="col-md-4 control-label">{{ trans('trips.destinations') }}</label>
                            <div class="col-md-6">
                                <select multiple class="form-control" id="destinations" name="destinations[]">
                                    @foreach ($destinations as $destination)
                                      <option value="{{$destination->id}}">{{$destination->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('destinations'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('destinations') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="departureDates form-group{{ $errors->has('departureDates1') ? ' has-error' : '' }}" id="departureDates1">
                            <label for="departureDates1" class="col-md-4 control-label">{{ trans('trips.departureDate') }}</label>
                            <div class="col-md-4">
                                <input id="datepicker" type="text" class="form-control" name="departureDates1" value="{{ old('departureDates1') }}">
                                @if ($errors->has('departureDates1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departureDates1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-info addDepartureDates">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('trips.addAnother') }}
                                </button>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="text-center">
                                <span style="margin-left:-120px;"><label><input type="checkbox" name="availability" value="true">{{ trans('trips.available') }}</label></span>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('common.submit') }}
                                </button>
                               </div> 
                        </div>

                        <input name="countDepartureDates" class="countDepartureDates" type="hidden" value="1">
                        <input name="hiddenLocale" class="hiddenLocale" type="hidden" 
                               data-value="@if(Session::get('language') == 'en')en @else el @endif" >

                    </form>

                </div>
            </div>


         </div>
       

    </div>

</div>
@endsection
