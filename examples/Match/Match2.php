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

echo match (false) {
    0 => "Oh no!\n",
    false => "This is what I expected\n",
};