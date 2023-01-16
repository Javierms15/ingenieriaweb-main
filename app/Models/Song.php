<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Song
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Song extends Model
{
    
    static $rules = [
		'_id' => 'required',
		'decade' => 'required',
		'artist' => 'required',
		'song' => 'required',
		'weeksAtOne' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['_id','decade','artist','song','weeksAtOne'];


}
