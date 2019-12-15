<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	/*Redireciona o usuário para a página perfil com as informações do usuário logado */
    public function perfil() {
    	return view('perfil', array('user' => Auth::user()));
    }
    /*Função que faz upload de nova imagem de perfil de usuário através de formulário POST*/
    public function novoAvatar(Request $request) {

    	/*Caso o POST tenha arquivo nomeado 'avatar'*/
    	if($request->hasFile('avatar')){

    		/*Procure o usuário na table user através do Auth:user*/
    		$user = User::find(Auth::user()->id);
    		/*Se o avatar do usuário não for padrão*/
    		if ($user->avatar !== 'default.png'){

    			/*Procure pelo avatar com o nome anterior*/
    			$file = 'uploads/avatars/'. $user->avatar;

    			/*Caso encontrar*/
    			if (File::exists($file)) {
    				/*Delete*/
    				unlink($file);
    			}
    		}
    		/*Puxe o arquivo 'avatar' do request e salve na variável $avatar*/
    		$avatar = $request->file('avatar');
    		/*Pegue a data, coloque o ponto de separação e mantenha a extensão original da foto do post ($avatar->getClientOriginalExtension()) e crie um nome com essas informações e salve no $filename*/
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		/*Através da extensão Intervention Image, crie uma imagem. Redimensione para 300x300px, salve para o caminho público /uploads/avatars/ com o $filename criado acima*/
    		Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename) );

    		/*Receba o user logado atualmente e salve em $user*/
    		$user = Auth::user();
    		/*Renomeie o atributo 'avatar' do usuário com o $filename criado acima*/
    		$user->avatar = $filename;
    		/*Salve*/
    		$user->save();
    	}

    	/*Retorna o usuário para a view 'perfil' com o array com as informações do usuário logado*/
    	return view('perfil', array('user' => Auth::user()));
    }
}
