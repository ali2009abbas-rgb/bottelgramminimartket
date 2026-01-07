<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyTelegramWebhook
{
    public function handle(Request $request, Closure $next)
    {
        // إذا كان المسار هو /webhook نتجاوز CSRF
        if ($request->is('webhook')) {
            return $next($request);
        }

        // باقي الطلبات تمر بشكل طبيعي
        return $next($request);
    }
    protected $except = [
    'webhook',
];

}

