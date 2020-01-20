<?php
   namespace App\Classes;

   use App\User;

   class ConsultaUser{

      public static function ConsultarUser($id) {
         $usuario = User::find($id);
         $resposta = ["nome" => $usuario->name, "avatar" => $usuario->avatar];
         return compact('resposta');
         
      }

   }
?>