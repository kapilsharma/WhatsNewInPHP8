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

class Address
{
    public $country;

    public function __construct()
    {
        // Adding dummy country for demonstration purpose
        $this->country = 'India';
    }
}

class User
{
    protected $address;

    public function __construct()
    {
        // Adding dummy address for demonstration purpose
        $this->address = new Address();
    }

    public function getAddress()
    {
        return $this->address;
    }
}

class Session
{
    public $user;

    public function __construct()
    {
        // Adding dummy user for demonstration purpose
        $this->user = new User();
    }
}

$session = new Session();

$country = $session?->user?->getAddress()?->country;

echo "Country is " . $country . PHP_EOL;
