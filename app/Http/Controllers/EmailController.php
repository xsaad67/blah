<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Log;
use App\Jobs\SendWelcomeEmail;
class EmailController extends Controller
{
    public function send(){
        Log::info("Request cycle without started");
      $title="nothing";
      $content="nothing";
        $this->dispatch((new SendWelcomeEmail())->delay(60*5));
             Log::info("Request cycle without Queues finished");
    	
    }
}
