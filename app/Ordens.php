<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordens extends Model
{
    protected $table = 'ordens';

    protected $fillable = [
    	'clientes_id',
    	'servico',
    	'dataServico',
    	'valor',
    	'pago',
        'estado',
    	'observacao'
    ];

    public function clienteResp() {

    	return $this->hasOne('App\Clientes');
    }

    public function comentarios() {
        /*A relação abaixo tem o segundo campo chamado 'ordemId' porque, normalmente, o laravel assume que a relação que você está tentando criar é o nome do Model + '_id'. No caso, ele estaria procurando por 'ordens_id', já que o nome da minha model é Ordens. Passando a segunda informação, posso informar o laravel qual será o campo no qual ele irá procurar, no caso, 'ordemId'.*/
        return $this->hasMany('App\Comentarios', 'ordemId');
    }

    public function addOrdens($novaOrdem)
    {
        $this->create($novaOrdem);
    }
}
