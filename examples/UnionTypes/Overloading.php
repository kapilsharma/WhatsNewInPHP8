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

Class Overloading
{
    public function add(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function add(float $number1, float $number2): float
    {
        return $number1 + $number2;
    }
}

$instance = new Overloading();
echo '1 + 2 = ' . $instance->add(1, 2) . PHP_EOL;
echo '1.1 + 2.2 = ' . $instance->add(1.1, 2.2) . PHP_EOL;
