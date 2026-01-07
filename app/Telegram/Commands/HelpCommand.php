<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    /**
     * اسم الأمر
     *
     * @var string
     */
    protected string $name = 'help';

    /**
     * وصف الأمر
     *
     * @var string
     */
    protected string $description = 'عرض قائمة الأوامر المتاحة';

    /**
     * تنفيذ الأمر
     */
    public function handle()
    {
        $this->replyWithMessage([
            'text' => "📖 قائمة الأوامر المتاحة:\n/start - بدء المحادثة\n/help - عرض هذه القائمة"
        ]);
    }
}
