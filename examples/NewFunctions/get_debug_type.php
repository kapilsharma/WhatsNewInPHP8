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

class ExampleClass
{
    // No code needed.
}

$exampleClassOrBool1 = new ExampleClass();
$exampleClassOrBool2 = false;

echo "PHP 7 example" . PHP_EOL;

echo "exampleClassOrBool1 is ";
echo is_object($exampleClassOrBool1) 
        ? get_class($exampleClassOrBool1)
        : gettype($exampleClassOrBool1);
echo PHP_EOL;
echo "exampleClassOrBool2 is ";
echo is_object($exampleClassOrBool2) 
        ? get_class($exampleClassOrBool2)
        : gettype($exampleClassOrBool2);
echo PHP_EOL;

echo "PHP 8 example" . PHP_EOL;

echo "exampleClassOrBool1 is " . get_debug_type($exampleClassOrBool1) . PHP_EOL;
echo "exampleClassOrBool2 is " . get_debug_type($exampleClassOrBool2) . PHP_EOL;

