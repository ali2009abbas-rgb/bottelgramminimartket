<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Http;

class CryptoCommand extends Command
{
    protected string $name = 'crypto';
    protected string $description = 'عرض سعر العملات الرقمية';

    public function handle()
    {
        // جلب السعر من CoinGecko API
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'bitcoin,ethereum',
            'vs_currencies' => 'usd'
        ]);

        $data = $response->json();

        $btcPrice = $data['bitcoin']['usd'] ?? 'غير متاح';
        $ethPrice = $data['ethereum']['usd'] ?? 'غير متاح';

        $message = "💰 أسعار العملات الرقمية الآن:\n";
        $message .= "• Bitcoin (BTC): $btcPrice دولار\n";
        $message .= "• Ethereum (ETH): $ethPrice دولار";

        $this->replyWithMessage([
            'text' => $message,
        ]);
    }
}
