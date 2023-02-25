<?php

declare(strict_types=1);

namespace Roman\Learn;

class MailMailer implements MailerContract
{
    public function sendMessage(string $address, string $message)
    {
        echo sprintf('mail message to %s: %s', $address, $message);
    }
}
