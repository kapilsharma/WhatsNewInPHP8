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

Class UnionTypes
{
    public function add(int|float $number1, int|float $number2): int|float
    {
        return $number1 + $number2;
    }
}

$instance = new UnionTypes();
echo '1 + 2 = ' . $instance->add(1, 2) . PHP_EOL;
echo '1.1 + 2.2 = ' . $instance->add(1.1, 2.2) . PHP_EOL;
