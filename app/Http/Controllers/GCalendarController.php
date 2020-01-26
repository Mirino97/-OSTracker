<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Session;
use Illuminate\Http\Request;

class GCalendarController extends Controller
{
    public function index () {

    	$client = self::getClient();
    	$teste = (array) $client;
    	dd($teste);
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
	    // Puxa as informações do .json e joga no $client (.json retirado do painel de configuração)
	    $client->setAuthConfig('../public/client_credentials.json');
	    $client->setApplicationName('Google Calendar OSTracker');
	    $client->setScopes([Google_Service_Calendar::CALENDAR_READONLY, "email"]);
	    $client->setRedirectUri('http://127.0.0.1:8000/test');
	    $client->setAccessType("offline");


	    $tokenPath = 'token.json';
    	if (file_exists($tokenPath)) {
	        $accessToken = json_decode(file_get_contents($tokenPath), true);
	        $client->setAccessToken($accessToken);
    	}

    	if ($client->isAccessTokenExpired()){
    		if ($client->getRefreshToken()){
    			$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    		}
    	} else {

    		$auth_url = $client->createAuthUrl();
    		echo "<a href='$auth_url'> Login </a>";
    		$code = isset($_GET['code']) ? $_GET['code'] : NULL;

    		$accessToken = $client->fetchAccessTokenWithAuthCode($code);
    		$client->setAccessToken($accessToken);

    		if (array_key_exists('error', $accessToken)) {
    			throw new Exception(join(', ', $accessToken));
    		}
    	}

    	if (!file_exists(dirname($tokenPath))) {
    		mkdir(dirname($tokenPath), 0700, true);
    	}
    	file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    	return $client;
    }
}
