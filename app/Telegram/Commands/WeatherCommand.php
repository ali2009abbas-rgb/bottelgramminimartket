<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\Http;

class WeatherCommand extends Command
{
    protected string $name = 'weather';
    protected string $description = 'عرض حالة الطقس وتوقعات الأيام القادمة لمصياف';

    public function handle()
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
    'q' => 'Masyaf', // اسم المدينة بالإنجليزية
    'appid' => env('OPENWEATHER_API_KEY'),
    'units' => 'metric',
    'lang' => 'ar'
]);

$data = $response->json();

if (isset($data['main'])) {
    $temp = $data['main']['temp'];
    $desc = $data['weather'][0]['description'];

    $message = "🌤️ الطقس الآن في مصياف:\n";
    $message .= "• الحرارة: {$temp}°C\n";
    $message .= "• الحالة: {$desc}";

    $this->replyWithMessage(['text' => $message]);
}

    }
}
