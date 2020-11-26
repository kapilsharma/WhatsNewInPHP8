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

class LateStaticBinding
{
    public static function getSelf()
    {
        return new self();
    }

    public static function getStatic()
    {
        return new static();
    }
}

class LateStaticBindingSubClass extends LateStaticBinding
{

}

echo get_class(LateStaticBindingSubClass::getSelf()) . PHP_EOL;
echo get_class(LateStaticBindingSubClass::getStatic()) . PHP_EOL;
echo get_class(LateStaticBinding::getSelf()) . PHP_EOL;
echo get_class(LateStaticBinding::getStatic()) . PHP_EOL;
