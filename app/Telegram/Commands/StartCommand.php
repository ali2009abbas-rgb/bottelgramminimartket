<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    /**
     * اسم الأمر الذي يستدعيه المستخدم
     *
     * @var string
     */
    protected string $name = 'start';

    /**
     * وصف الأمر
     *
     * @var string
     */
    protected string $description = 'بدء المحادثة مع البوت';

    /**
     * تنفيذ الأمر
     */
    public function handle()
    {
        $this->replyWithMessage([
            'text' => "اهلا عبد الله عباس! 👋\nمرحبًا بك في بوت التليجرام الخاص بنا. كيف يمكنني مساعدتك اليوم؟"
        ]);
    }
}
