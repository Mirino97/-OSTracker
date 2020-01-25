<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Session;
use Illuminate\Http\Request;

class GCalendarController extends Controller
{
    public function index () {


    	$pay_load = Session::get('pay_load');
    	dd($pay_load);
    }

    public function getClient () {

    $client = new Google_Client();
    $client->setAuthConfig('../public/client_credentials.json');
    $client->setApplicationName('Google Calendar OSTracker');
    $client->setScopes([Google_Service_Calendar::CALENDAR_READONLY, "email"]);
    $client->setRedirectUri('http://127.0.0.1:8000/test');
    $client->setAccessType("offline");

    $auth_url = $client->createAuthUrl();
    echo "<a href='$auth_url'> Login </a>";


    $code = isset($_GET['code']) ? $_GET['code'] : NULL;
    
	    if (isset($code)){

	    	try {

	    		$token = $client->fetchAccessTokenWithAuthCode($code);
	    		$client->setAccessToken($token);

	    	} catch (Exception $e) {
	    		echo $e->getMessage();
	    	}

	    	try {

	    		$pay_load = $client->verifyIdToken();

	    	} catch (Exception $e) {

	    		echo $e->getMessage();

	    	}

	    } else {
	    	$pay_load = null;
	    }

	    if(isset($pay_load)){
	    	dd($pay_load);
	    return redirect('/test1')->with(['pay_load', $pay_load]);
		}
    }
}
