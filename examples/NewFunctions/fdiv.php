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

// Example taken from https://www.php.net/manual/en/function.intdiv.php

var_dump(fdiv(3, 2));
var_dump(fdiv(-3, 2));
var_dump(fdiv(3, -2));
var_dump(fdiv(-3, -2));
var_dump(fdiv(PHP_FLOAT_MAX, PHP_FLOAT_MAX));
var_dump(fdiv(PHP_FLOAT_MIN, PHP_FLOAT_MIN));
var_dump(fdiv(PHP_FLOAT_MIN, -1));
var_dump(fdiv(1, 0));
var_dump(fdiv(-1, 0));
var_dump(fdiv(0, 0));
