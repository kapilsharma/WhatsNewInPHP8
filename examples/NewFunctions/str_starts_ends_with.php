<?php
// Credit: This example is taken from official RFC
// https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions

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

$str = "beginningMiddleEnd";
if (str_starts_with($str, "beg")) echo "printed\n";
if (str_starts_with($str, "Beg")) echo "not printed\n";
if (str_ends_with($str, "End")) echo "printed\n";
if (str_ends_with($str, "end")) echo "not printed\n";
 
// empty strings:
if (str_starts_with("a", "")) echo "printed\n";
if (str_starts_with("", "")) echo "printed\n";
if (str_starts_with("", "a")) echo "not printed\n";
if (str_ends_with("a", "")) echo "printed\n";
if (str_ends_with("", "")) echo "printed\n";
if (str_ends_with("", "a")) echo "not printed\n";
