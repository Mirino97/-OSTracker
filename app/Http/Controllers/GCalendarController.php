<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Session;
use Illuminate\Http\Request;
use Response;

class GCalendarController extends Controller
{
    public function index () {

    	// Utiliza o getClient (presente no mesmo controller, por isso o self::) e salva as informações
    	$client = self::getClient();
    	// Força o $client em um array
    	$teste = (array) $client;
    	// Continuar daqui

    	$client2 = new Google_Client($teste);
    	$service = new Google_Service_Calendar($client2);

    	$calendarId = 'primary';
    	$optParams = array('maxResults' => 10, 'orderBy' => 'startTime', 'singleEvents' => true, 'timeMin' => date('c'), );

    	$results = $service->events->listEvents($calendarId, $optParams);
    	$events = $results->getItems();

    	if (empty($events)) {
			    print "No upcoming events found.\n";
			} else {
			  echo "Upcoming events:\n";
			  foreach ($events as $event) {
			  $start = $event->start->dateTime;
			        if (empty($start)) {
			            $start = $event->start->date;
			        }
			        echo($event->getSummary());
			    }
			}
    }

    public function getClient() {

    	// Cria uma nova instância de Google_Client
	    $client = new Google_Client();
	    // Puxa as informações do .json e joga no $client (.json retirado do painel Google Cloud Platform)
	    $client->setAuthConfig('../public/client_credentials.json');
	    // Nomeia a Aplicação
	    $client->setApplicationName('Google Calendar OSTracker');
	    // Diz ao API o que você irá acessar
	    $client->setScopes([Google_Service_Calendar::CALENDAR_READONLY, "email"]);
	    // Qual URI o API deve esperar retornar
	    $client->setRedirectUri('http://127.0.0.1:8000/test');
	    $client->setAccessType("offline");

	    
	    // Cria um URL de autenticação
		$auth_url = $client->createAuthUrl();
		// Gera o botão para acessar URL
		echo "<a href='$auth_url'> Login </a>";
		// Salva o código na variável $code (analisar mais de perto)
		$code = isset($_GET['code']);



	    // Cria um caminho para salvar o token localmente (para não ter que ficar pedindo toda vez que o usuário precisar)
	    /*$tokenPath = 'token.json';*/

	    //Checa se o arquivo existe. Caso sim, decodifique o arquivo, pegue seu conteúdo e salve-o no client.
    	/*if (file_exists($tokenPath)) {
	        $accessToken = json_decode(file_get_contents($tokenPath), true);
	        $client->setAccessToken($accessToken);
    	}*/

    	if (isset($code)) {

	    	// Caso o token de acesso expirar, crie um novo.
	    	if ($client->isAccessTokenExpired()){
	    		if ($client->getRefreshToken()){
	    			$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
	    		}

	    	} else {

	    		
	    		// Salva o token após utilizar o $code e salva no client
	    		$accessToken = $client->fetchAccessTokenWithAuthCode($code);
	    		$client->setAccessToken($accessToken);

	    		// Analisa se existem erros e se sim, cria um novo Exception
	    		if (array_key_exists('error', $accessToken)) {
	    			throw new Exception(join(', ', $accessToken));
	    		}
	    	}
	    }

    	/*// Caso o arquivo de token não exista, criar um novo 
    	if (!file_exists(dirname($tokenPath))) {
    		mkdir(dirname($tokenPath), 0700, true);
    	}*/

    	// Salvar o token do $client no arquivo de tokens e enncripá-lo
    	/*file_put_contents($tokenPath, json_encode($client->getAccessToken()));*/
    	return Response::json($client);
    }
}
