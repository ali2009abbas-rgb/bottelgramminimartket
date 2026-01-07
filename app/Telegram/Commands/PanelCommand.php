<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;

class PanelCommand extends Command
{
    protected string $name = 'panel';
    protected string $description = 'Show reply keyboard panel';

    public function handle()
    {
        $keyboard = Keyboard::make([
            'resize_keyboard' => true,
            'one_time_keyboard' => false,
        ])
        ->row([
            Keyboard::button(['text' => '📋 قائمة']),
            Keyboard::button(['text' => 'ℹ️ مساعدة']),
        ])
        ->row([
            Keyboard::button(['text' => '❌ إغلاق اللوحة']),
        ]);

        $this->replyWithMessage([
            'text' => "هذه لوحة أزرار دائمة. اختر أمرًا:",
            'reply_markup' => $keyboard,
        ]);
    }
}
