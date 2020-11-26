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

class TypeHinting2
{
    public int $intType;

    public function __construct(int $intType)
    {
        $this->intType = $intType;
    }

    public function printValue()
    {
        echo 'Value of variable is ' . $this->intType . PHP_EOL;
    }
}

$instance = new TypeHinting2(2);
$instance->printValue();

$instance->intType = 2.2;
$instance->printValue();

$instance->intType = "3.5 is a float with some extra string";
$instance->printValue();

$instance->intType = "Now we have a string that can't be casted to int";
$instance->printValue();
