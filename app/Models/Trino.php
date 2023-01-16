<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Trino
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Trino extends Model
{
    
    static $rules = [
		'_id' => 'required',
		'autor' => 'required',
		'post' => 'required',
		'lat' => 'required',
		'long' => 'required',
		'stamp' => 'required',
		'reports' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['_id','autor','post','lat','long','stamp','reports'];


}
