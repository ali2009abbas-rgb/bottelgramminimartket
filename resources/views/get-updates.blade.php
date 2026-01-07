<?php

use Telegram\Bot\Laravel\Facades\Telegram;

$updates = Telegram::getUpdates();
 dd($updates);