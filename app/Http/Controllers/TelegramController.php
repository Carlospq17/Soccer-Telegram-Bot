<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function index(){
        $response = Telegram::getMe();
        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        $updates = Telegram::getWebhookInfo();
        dd($updates);
    }

    public function setWebhook(){
        Log::info("Setting new webhook");
        $parameters = array(
            "url" => 'http://127.0.0.1:8000/'
        );
        $webhook = Telegram::setWebhook($parameters);
    }
}
