<?php

declare(strict_types=1);

namespace Roman\Learn;

interface MailerContract
{
    public function sendMessage(string $address, string $message);
}
