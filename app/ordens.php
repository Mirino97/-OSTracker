<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordens extends Model
{
    protected $table = 'ordens';

    protected $fillable = [
    	'clientes_id',
    	'servico',
    	'dataServico',
    	'valor',
    	'pago',
    	'observacao'
    ];

    public function clienteResp() {

    	return $this->hasOne('App\clientes');
    }

    public function addOrdens($novaOrdem)
    {
        $this->create($novaOrdem);
    }
}
