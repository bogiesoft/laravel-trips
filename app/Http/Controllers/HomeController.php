<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Domains;
use App\Trips;
use App\Destinations;
use App\DeparturesDates;
use App\DestinationsPhotos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if (!$request->session()->has('language')) {
            $langPref = "en";
            $request->session()->put('language', $langPref);
        }

        if($request->session()->get('language') == 'en'){
            \App::setLocale('en');
        }else{
             \App::setLocale('el');
        }


        $destinations = Destinations::all();
        $domains = Domains::all();

        return view('home')->with(['destinations' => $destinations])
                            ->with(['domains' => $domains]);
    }

    /**
     * Method to show the view with the Form for adding new Destinations.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddDestination(Request $request)
    {
        if($request->session()->get('language') == 'en'){
            \App::setLocale('en');
        }else{
             \App::setLocale('el');
        }

        return view('showAddDestination');

    }

    /**
     * Post method to add a new Destination.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDestination(Request $request)
    {
            
        $this->validate($request, [
                'title' => 'required|max:100',
                'country' => 'required|max:40',
                'description' => 'required',
                'dest_lat' => 'required|numeric',
                'dest_long' => 'required|numeric',
                'dest_photo1' => 'required|max:40',
            ]);


        $destination = new Destinations;
        
        $destination->title = $request->input('title');
        $destination->country = $request->input('country');
        $destination->description = $request->input('description');
        $destination->dest_lat = $request->input('dest_lat');
        $destination->dest_long = $request->input('dest_long');
        $destination->save();

        $destinationPhoto = new DestinationsPhotos;
        $destinationPhoto->photo = $request->input('dest_photo1');

        $destination->destinationPhotos()->save($destinationPhoto);

        $countPhotos = $request->input('countPhotos');

        for ( $k=2; $k <= $countPhotos; $k++ ) {

            $tempVarPhotoInputName = 'dest_photo' . $k;
            if ($request->has($tempVarPhotoInputName) ){

                $destinationPhotoFile = $request->input($tempVarPhotoInputName);
                $destinationPhoto = new DestinationsPhotos;
                $destinationPhoto->photo = $request->input($tempVarPhotoInputName);

                $destination->destinationPhotos()->save($destinationPhoto);

            }

        }

        
        return redirect('/home');
    }

    
    /**
     * Method to show the view with the Form for adding new Trip Packages.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddTrips(Request $request)
    {
        if($request->session()->get('language') == 'en'){
            \App::setLocale('en');
        }else{
             \App::setLocale('el');
        }

        $destinations = Destinations::all();
        $domains = Domains::all();

        return view('showAddTrips')->with(['destinations' => $destinations])
                                   ->with(['domains' => $domains]);

    }

     /**
     * Post method to add a new Trip Package.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTripPackage(Request $request)
    {
          
        $this->validate($request, [
                'trip_package' => 'required|unique:trips,trip_package|min:5|max:5',
                'title' => 'required|max:100',
                'description' => 'required',
                'duration' => 'required|max:25',
                'departureDates1' => 'required|date|date_format:Y/n/j',
                'destinations' => 'required',
            ]);

        $domain = Domains::where('id', $request->input('domains'))->first();
        
        $trip = new Trips;
        
        $trip->trip_package = $request->input('trip_package');
        $trip->title = $request->input('title');
        $trip->description = $request->input('description');
        $trip->duration = $request->input('duration');
        $trip->availability = ($request->input('availability') == 'true' ? true : false);

        $domain->trips()->save($trip);

        $departureDate = new DeparturesDates;
        $departureDate->departure = $request->input('departureDates1');

        $trip->departureDates()->save($departureDate);


        
        $countDepartureDates = $request->input('countDepartureDates');

        for ( $k=2; $k <= $countDepartureDates; $k++ ) {

            $tempVarDepartureInputName = 'departureDates' . $k;
            if ($request->has($tempVarDepartureInputName) ){

                $date = $request->input($tempVarDepartureInputName);
                $departureDate = new DeparturesDates;
                $departureDate->departure = $request->input($tempVarDepartureInputName);

                $trip->departureDates()->save($departureDate);

            }

        }
        
        $destinations = $request->input('destinations');
        foreach( $request->input('destinations') as $selected_destination_id){

                $trip->destinations()->attach($selected_destination_id);
        }

        
        return redirect('/home');
        

    }


    
    /**
     * Method to show the view with the Form for adding new Domainss.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddDomains(Request $request)
    {
        if($request->session()->get('language') == 'en'){
            \App::setLocale('en');
        }else{
             \App::setLocale('el');
        }

        return view('showAddDomains');

    }

    /**
     * Post method to add a new Domain.
     *
     * @return \Illuminate\Http\Response
     */
    public function addNewDomain(Request $request)
    {
       
        $this->validate($request, [
                'language' => 'required|max:25',
                'name' => 'required|max:100|unique:domains,name',
            ]);

        $domain = new Domains;
        $domain->language = $request->input('language');
        $domain->name = $request->input('name');
        $domain->save();

        return redirect('/home');
    }

    
    /**
     * Method to return all Domains as JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDomains(Request $request)
    {
        $domains = Domains::with('trips')->get();

        return $domains->toJson();

    }

     /**
     * Method to return all Destinations as JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDestinations(Request $request)
    {
        $destinations = Destinations::with('destinationPhotos')->get();
        
        return $destinations->toJson();

    }

     /**
     * Method to return all Trips Packages as JSON.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTrips(Request $request)
    {
        $trips = Trips::with('domain')->with('destinations')->with('departureDates')->get();

        return $trips->toJson();

    }

    /**
     * Method to change Language Locale.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage(Request $request)
    {
        if ( $request->session()->get('language') == 'el' ){
            $request->session()->put('language', 'en');
             
        }else{
            $request->session()->put('language', 'el');
           
        }

        
        return redirect('/home');

    }


}
