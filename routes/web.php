<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Keyboard\Keyboard;

Route::post('/webhook', function () {
    try {

        Log::info("UPDATE:", request()->all());

        $update = request()->all();

        // أوامر نصية مثل /start
        if (isset($update['message'])) {
            $chatId = $update['message']['chat']['id'];
            $text   = $update['message']['text'] ?? '';

            if ($text === '/start') {
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text'    => "البوت شغال ✔️",
                ]);
            }
        }

        return response('ok', 200);

    } catch (\Exception $e) {

        Log::error("TELEGRAM ERROR: " . $e->getMessage());
        return response('error', 500);
    }
});




// Route::post('/webhook', function () {
//     $update = request()->all();

//     // أوامر نصية مثل /start
//     if (isset($update['message'])) {
//         $chatId = $update['message']['chat']['id'];
//         $text   = $update['message']['text'] ?? '';

//         if ($text === '/start') {
//             Telegram::bot('mybot')->sendMessage([
//                 'chat_id' => $chatId,
//                 'text'    => "👋 أهلاً بك في متجرنا!\nاختر نوع المواد لعرض الأسعار:",
//                 'reply_markup' => Keyboard::make()
//                     ->inline()
//                     ->row([
//                         Keyboard::inlineButton(['text' => '🥫 المواد الغذائية', 'callback_data' => 'category_food']),
//                         Keyboard::inlineButton(['text' => '🧼 مواد التنظيف', 'callback_data' => 'category_cleaning']),
//                     ]),
//             ]);
//         }
//     }

//     // معالجة الضغط على الأزرار
//     if (isset($update['callback_query'])) {
//         $callback = $update['callback_query'];
//         $data     = $callback['data'];
//         $chatId   = $callback['message']['chat']['id'];

//         // جلب سعر الصرف من قاعدة البيانات
//         $exchangeRate = DB::table('settings')->where('key', 'exchange_rate')->value('value');

//         if ($data === 'category_food') {
//             $products = DB::table('products')->where('category', 'food')->get();
//             $msg = "🥫 أسعار المواد الغذائية:\n";
//             foreach ($products as $p) {
//                 $priceSYP = $p->price_usd * $exchangeRate;
//                 $msg .= "- {$p->name}: " . number_format($priceSYP) . " ل.س\n";
//             }
//             Telegram::bot('mybot')->sendMessage([
//                 'chat_id' => $chatId,
//                 'text'    => $msg,
//             ]);
//         }

//         if ($data === 'category_cleaning') {
//             $products = DB::table('products')->where('category', 'cleaning')->get();
//             $msg = "🧼 أسعار مواد التنظيف:\n";
//             foreach ($products as $p) {
//                 $priceSYP = $p->price_usd * $exchangeRate;
//                 $msg .= "- {$p->name}: " . number_format($priceSYP) . " ل.س\n";
//             }
//             Telegram::bot('mybot')->sendMessage([
//                 'chat_id' => $chatId,
//                 'text'    => $msg,
//             ]);
//         }
//     }

//     return response('ok', 200);
// })->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);
