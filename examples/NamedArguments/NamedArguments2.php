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

class NamedArguments2
{
    public function printUserInfo(
        string $name,
        int $age,
        string $occupation = '',
        string $company = '',
        string $school = ''
    ) {
        $output = "Hello $name, you are $age years old,";

        if ($occupation !== '') {
            $output .= " you are a $occupation";
        }

        if ($school !== '') {
            $output .= " and study in $school";
        }

        if ($company !== '') {
            $output .= " and work in $company";
        }

        echo $output . PHP_EOL;
    }
}

$instance = new NamedArguments2();

$instance->printUserInfo(
    name: 'Kapil',
    age: 38,
    occupation: 'Developer',
    company: 'Cactus Global'
);

$instance->printUserInfo(
    school: 'Some School',
    occupation: 'Student',
    age: 8,
    name: 'Pari'
);
