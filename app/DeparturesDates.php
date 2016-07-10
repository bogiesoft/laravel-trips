<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeparturesDates extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departures_dates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departure'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Trip that a Departure Date is associated with.
     */
    public function trip()
    {
        return $this->belongsTo('App\Trips', 'trip_id', 'id');
    }

}
