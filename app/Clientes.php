<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
    	'nome',
    	'telefone',
    	'endereco',
    	'email',
    	'cnpj',
    ];

    public function getOrdens() {

    	return $this->hasMany('App\Ordens');
    }

    public function getEquipamentos() {

        return $this->hasMany('App\Equipamentos', 'clientes_id');
    }

    
}
