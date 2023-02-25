<?php

declare(strict_types=1);

namespace Roman\Learn;

class TelegramMailer implements MailerContract
{
    public function sendMessage(string $address, string $message)
    {
        echo sprintf('telegram message to %s: %s', $address, $message);
    }
}
