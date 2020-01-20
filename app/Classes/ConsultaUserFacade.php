<?php
namespace App\Classes;

use Illuminate\Support\Facades\Facade;

class ConsultaUserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ConsultaUser';
    }
}
?>