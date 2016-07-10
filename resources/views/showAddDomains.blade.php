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
                        {{ trans('domains.domainsInfoHeading') }}
                    </a>
                </div>

                <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body" >

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addNewDomain') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                            <label for="language" class="col-md-4 control-label"> {{ trans('domains.language') }}</label>
                            <div class="col-md-6">
                                <input id="language" type="text" class="form-control" name="language" value="{{ old('language') }}">
                                @if ($errors->has('language'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ trans('domains.domainName') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('common.submit') }}
                                </button>
                               </div> 
                        </div>



                    </form>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
