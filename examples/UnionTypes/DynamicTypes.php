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

$intType = null; // Variable can be null, may be no problem.
echo "Value of variable is: $intType" . PHP_EOL;

$intType = 2; // Right and expected type.
echo "Value of variable is: $intType" . PHP_EOL;

$intType *= 1.4; // Wait, it will be 2.8 and PHP will cast it to a float, doesn't match with name of variable.
echo "Value of variable is: $intType" . PHP_EOL;

$intType = "Let's make it string, I don't care for types"; // Perfectly fine.
echo "Value of variable is: $intType" . PHP_EOL;
