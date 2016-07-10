@extends('layouts.app')

@section('content')

<div class="container" style="margin-bottom:40px;">

     <div class="row">

        <h4>{{ trans('home.language') }}</h4>
        

        <div class="form-group">
        
            <div class="col-md-2">
                @if(Session::get('language') == 'en')
                    <span class="blueText">{{ trans('home.languageEn') }} </span> ,
                @else
                    <span style="font-size: 17px;">{{ trans('home.languageEn') }} </span> , 
                @endif

                @if(Session::get('language') == 'el')
                    <span class="blueText">{{ trans('home.languageEl') }}</span>
                @else
                    <span style="font-size: 17px;">{{ trans('home.languageEl') }} </span>
                @endif
            </div>
             <div class="col-md-10">
                <a href="{{url('/changeLanguage')}}" role="button" class="btn btn-info changeLanguage">{{ trans('home.switchLanguage') }}</a>
             </div>
         </div>

     </div>

</div>


<div class="container">

    <div class="row">

        <div class="col-sm-3"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('home.newDomainsHeadind') }}</div>
                    <div class="panel-body"><a href="{{url('addDomains')}}">{{ trans('home.newDomainsMsg') }}</a></div>
                </div>
           </div>
       
            <div class="col-sm-3"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('home.newDestsHeading') }}</div>
                    <div class="panel-body"><a href="{{url('addDestinations')}}">{{ trans('home.newDestinations') }}</a></div>
                </div>
            </div>  

            <div class="col-sm-3"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('home.newTripsHeading') }}</div>
                    <div class="panel-body">
                        @if ( empty($domains) || count($domains) == 0  )
                            {{ trans('home.emptyDomains') }}
                        @elseif ( empty($destinations) || count($destinations) == 0  )
                            {{ trans('home.emptyDestinations') }}
                        @else
                            <a href="{{url('addTrips')}}">{{ trans('home.newTripsPage') }}</a>
                        @endif
                    </div>
                </div>
            </div>  

                <div class="col-sm-3"> 
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('home.logOUT') }}</div>
                    <div class="panel-body"><a href="{{url('/logout')}}">{{ trans('home.logOut') }}</a></div>
                </div>
            </div> 

        
    </div>
</div>

<div class="container">

    <div class="row">

        <div class="col-md-12 ">

            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('home.jsonMethods') }}</div>

                <div class="panel-body">
                    <h4 style="margin-top:20px;"><a href="{{url('getDomains')}}">{{ trans('home.jsonDomains') }}</a></h4>
                    <h4 style="margin-top:20px;"><a href="{{url('getDestinations')}}">{{ trans('home.jsonDests') }}</a></h4>
                    <h4 style="margin-top:20px;"><a href="{{url('getTrips')}}">{{ trans('home.jsonTrips') }}</a></h4>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
