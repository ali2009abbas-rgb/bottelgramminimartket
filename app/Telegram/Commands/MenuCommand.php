<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class MenuCommand extends Command
{
    protected string $name = 'menu';
    protected string $description = 'عرض لوحة الأوامر الرئيسية (Inline Keyboard)';

    public function handle()
    {
        $keyboard = Keyboard::make()
            ->inline()
            ->row([
                Keyboard::inlineButton(['text' => '🌤️ الطقس (مصياف)', 'callback_data' => 'weather_masyaf']),
                Keyboard::inlineButton(['text' => '💰 العملات الرقمية', 'callback_data' => 'crypto']),
            ])
            ->row([
                Keyboard::inlineButton(['text' => '📋 قائمة', 'callback_data' => 'panel']),
                Keyboard::inlineButton(['text' => 'ℹ️ مساعدة', 'callback_data' => 'help']),
            ])
            ->row([
                Keyboard::inlineButton(['text' => '❌ إغلاق اللوحة', 'callback_data' => 'close']),
            ]);

        $this->replyWithMessage([
            'text' => "📌 هذه هي لوحة الأوامر الرئيسية. اختر ما يناسبك:",
            'reply_markup' => $keyboard,
        ]);
    }
}
