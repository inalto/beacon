<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

use Illuminate\Http\Request;
use Telegram\Bot\Api;

$router->get('/', function () use ($router) {

    return; 
});


$router->post('/',function(Request $r) {

	$telegram = new Api(env('TELEGRAM_API'));
	$msg = "\n";
	$msg .= "Server: <b>".$r->input('hostname')."</b>";
	$msg .= "\n\n";
	$msg .= "Subject: ".$r->input('subject');
	$msg .= "\n\n";
	$msg .= $r->input('body');
	$msg .= "\n\n";
	$msg .= "<b>👉 <a href='https://".$r->input('hostname')."/whm/'>Login to server</a></b>";

	$telegram->sendMessage(['chat_id'=>env('TELEGRAM_CHAT_ID'),'text'=>$msg,"parse_mode"=>"HTML",'disable_web_page_preview' => 'true','no_webpage' => true]);

return;

}); 
