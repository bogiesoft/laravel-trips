<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationsPhotos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'destinations_photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Destination that a Destination Photo is associated with.
     */
    public function destination()
    {
        return $this->belongsTo('App\Destinations', 'dest_id', 'id');
    }
}
