<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
    	'nome',
    	'telefone',
    	'endereco',
    	'email',
    	'cnpj',
    ];

    public function ordens() {

    	return $this->hasMany('App\ordens');
    }
}
