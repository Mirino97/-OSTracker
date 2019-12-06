<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $table = 'equipamentos';

    protected $fillable = [
        'clientes_id',
        'nome',
        'usuario',
    	'processador',
    	'ram',
    	'hd',
    	'ethernet',
    	'ip',
    	'ipfixo',
    	'programas'
    ];

    public function clienteResp() {

        return $this->hasOne('App\Clientes');
    }

    public function addEquipamento($post)
    {
        $this->create($post);
    }
}
