<?php

declare(strict_types=1);

use Roman\Learn\Container;
use Roman\Learn\Controller;
use Roman\Learn\MailerContract;

require 'vendor/autoload.php';

$containerClass = Container::class;

$container = new $containerClass;

// ServiceProvider
$container->singleton(MailerContract::class, function (){
    return new \Roman\Learn\MailMailer();
});

$controller = $container->make(Controller::class);


$controller->send('@asdasda', 'Hello!');
