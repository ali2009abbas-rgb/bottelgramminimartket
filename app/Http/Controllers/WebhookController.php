<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info("UPDATE:", $request->all());
        return response('ok', 200);
    }
}
