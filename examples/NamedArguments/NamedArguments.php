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

class NamedArguments
{
    public function printUserInfo(
        string $name,
        int $age,
        string $occupation,
    ) {
        echo "Hello $name, you are $age years old and work as $occupation." . PHP_EOL;
    }
}

$instance = new NamedArguments();

$instance->printUserInfo(
    name: 'Kapil',
    age: 38,
    occupation: 'Developer'
);

$instance->printUserInfo(
    occupation: 'Student',
    age: 8,
    name: 'Pari'
);
