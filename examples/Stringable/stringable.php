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

class ClassWithToString
{
    public function __toString(): string
    {
        return 'test string from ClassWithToString::__toString';
    }
}

function testStringable(string|Stringable $stringable) {
    echo "String is '$stringable'" . PHP_EOL;
}

testStringable(new ClassWithToString());
testStringable('Notmal string');