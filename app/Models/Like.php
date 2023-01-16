<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\User as User;


class Like extends Model
{
    use HasFactory;

    static $rules = [
		'descripcion' => 'required',
        'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'publicacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'publicacion_id');
    }
}
