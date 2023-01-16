<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Parada
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parada extends Model
{
    
    static $rules = [
		'_id' => 'required',
		'codLinea' => 'required',
		'nombreLinea' => 'required',
		'sentido' => 'required',
		'orden' => 'required',
		'codParada' => 'required',
		'nombreParada' => 'required',
		'direccion' => 'required',
		'lon' => 'required',
		'lat' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['_id','codLinea','nombreLinea','sentido','orden','codParada','nombreParada','direccion','lon','lat'];


}
