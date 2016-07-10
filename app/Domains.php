<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domains extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'domains';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language', 'name'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Trip Packages associated with the Domain.
     */
    public function trips()
    {
        return $this->hasMany('App\Trips', 'domain_id', 'id');
    }

    
}
