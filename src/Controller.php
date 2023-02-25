<?php

declare(strict_types=1);

namespace Roman\Learn;

class Controller
{
    private MailerContract $mailer;

    public function __construct(MailerContract $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(string $to, string $message): void
    {
        // asdasda
        ///asdasda

        $this->mailer->sendMessage($to, $message);
    }
}
