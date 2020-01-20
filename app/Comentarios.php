<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'ordemId',
        'userId',
        'comentario',
    ];

    public function ordemResp() {

        return $this->hasOne('App\Ordens');
    }

    public function userResp() {

        return $this->hasOne('App\User');
    }
}
