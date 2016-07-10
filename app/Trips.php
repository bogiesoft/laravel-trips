<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trip_package', 'title', 'description', 'availability', 'duration'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Departures Dates associated with the Trip.
     */
    public function departureDates()
    {
        return $this->hasMany('App\DeparturesDates', 'trip_id', 'id');
    }

    /**
     * The Destinations that belong to the Trip.
     */
    public function destinations()
    {
        return $this->belongsToMany('App\Destinations', 'destinations_trips', 'trip_id', 'dest_id');
    }

    /**
     * Get the Domain associated with the Trip Package.
     */
    public function domain()
    {
        return $this->belongsTo('App\Domains', 'domain_id', 'id');
    }
}
