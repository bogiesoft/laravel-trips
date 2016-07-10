<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'destinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'country', 'description', 'dest_lat', 'dest_long'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Photos associated with the Destination.
     */
    public function destinationPhotos()
    {
        return $this->hasMany('App\DestinationsPhotos', 'dest_id', 'id');
    }

    /**
     * The Trips that belong to the Destination.
     */
    public function trips()
    {
        return $this->belongsToMany('App\Trips', 'destinations_trips', 'dest_id', 'trip_id');
    }
}
