<?php

/*
| -----------------------------------------------------------------------------
| What's new in PHP 8
| Author: Kapil Sharma
| -----------------------------------------------------------------------------
| This code is part of ebook "What's new in PHP 8", authored by Kapil Sharma,
| and distributed freely during Laravel Nagpur meetup.
|
| Ebook can be downloaded form https://github.com/kapilsharma/WhatsNewInPHP8
|
| On the README.md file of above GitHub repo, you may also find YouTube link
| of the meetup recording.
| -----------------------------------------------------------------------------
*/

declare(strict_types = 1);

require_once(__DIR__ . '/../../vendor/autoload.php');

use Phpreboot\Php8\Attributes\TestClass;

$reflection = new \ReflectionClass(TestClass::class);
$classAttributes = $reflection->getAttributes();

echo $classAttributes[0]->newInstance()->testArgument . PHP_EOL;
