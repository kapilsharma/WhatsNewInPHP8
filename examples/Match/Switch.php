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

function printFavoriteColor($colour)
{
    switch ($colour) {
        case 'red':
            echo 'Your favorite colour is Red.' . PHP_EOL;
        case 'blue':
            echo 'Your favorite colour is Blue.' . PHP_EOL;
        case 'green':
            echo 'Your favorite colour is Green.' . PHP_EOL;
        default:
            echo 'You do not like any primary colour.' . PHP_EOL;
    }
}

printFavoriteColor('Yellow');
