## Nullsafe operator

> RFC: [https://wiki.php.net/rfc/nullsafe_operator](https://wiki.php.net/rfc/nullsafe_operator)

### History

Skip to title `Changes in PHP 8` if you are interested to see only the changes made in PHP 8.

### PHP ternary operator

The ternary operator is available in PHP since very long thus hopefully, you already know about it. Its syntax is `(expr1) ? (expr2) : (expr3)`, it is equivalent to

```php
if ($expr1) {
    return $expr2;
} else {
    return $expr3;
}
```

### Ternary shortcut (?:)

The shortcut operator does not have `expr2` of the above example. It is like `(expr1) ?: (expr2)`. Let's understand it by an example:

```php
$result = $variable1 ?: $variable2;
```

Which is equivalent to

```php
$result = $variable1 ? $variable1 : $variable2;
```

or

```php
if ($variable1) {
    $result = $variable1;
} else {
    $result = $variable2;
}
```

### Null coalescing operator (??)

PHP 7.0 introduced `Null coalescing operator (??)`, which confuse some people between `??` and `?:` operators. Following example is taken from [PHP manual (https://www.php.net/manual/en/migration70.new-features.php)](https://www.php.net/manual/en/migration70.new-features.php):

`The null coalescing operator (??) has been added as syntactic sugar for the common case of needing to use a ternary in conjunction with isset(). It returns its first operand if it exists and is not NULL; otherwise, it returns its second operand.`

```php
<?php
// Fetches the value of $_GET['user'] and returns 'nobody'
// if it does not exist.
$username = $_GET['user'] ?? 'nobody';
// This is equivalent to:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';

// Coalescing can be chained: this will return the first
// defined value out of $_GET['user'], $_POST['user'], and
// 'nobody'.
$username = $_GET['user'] ?? $_POST['user'] ?? 'nobody';
?>
```

To make it more clear, let's see a few more examples with a comparison between `??` and `?:`:

```php
// Lets compare them on null variable.
$a = null;
print $a ?: 'b'; // Output: b, because if(null) returns false
print $a ?? 'b'; // Output: b, because isset(null) returns false

// Let's check a variable which is not defined
print $c ?: 'a'; // Output: Notice: Undefined variable: c
print $c ?? 'a'; // Output: a, because isset($c) is false.

// Let's check it once again with an array key
$b = array('a' => null);
print $b['a'] ?? 'd'; // Output: d, because $b['a'] is null, which is not true.
print $b['a'] ?: 'd'; // Output: d, because isset($b['a']) = isset(null) = false
```

Thus, ternary shortcut (?:) check the variable for truth (`if ($variable)`) and null coalescing operator check the variable with `isset()` method. You may check much better comparison between these two conditions on [PHP Manual (https://www.php.net/manual/en/types.comparisons.php)](https://www.php.net/manual/en/types.comparisons.php)

### Changes in PHP 8: nullsafe operator (?->)

Problem with the null coalescing operator is, it works only with variables. Thus, PHP 8 introduced nullsafe operator (?->)[(Check RFC: https://wiki.php.net/rfc/nullsafe_operator)](https://wiki.php.net/rfc/nullsafe_operator) to solve this problem.

Let's understand it with an example:

**examples/NullsafeOperator/NoNullsafePhp7.php**

```php
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

$country = null;
 
if ($session !== null) {
    $user = $session->user;
 
    if ($user !== null) {
        $address = $user->getAddress();
 
        if ($address !== null) {
            $country = $address->country;
        }
    }
}

echo "Country is " . $country . PHP_EOL;
```

I've taken an example of original RFC and extended it to be executable on the command line. Although code is simple and self-explaining, let me explain it. Here, I try to demonstrate a web session, session contains a user, who has an address containing the user's country. As we need to validate if the required information is present, we need to have three if conditions:

```php
if ($session !== null) {
    $user = $session->user;
 
    if ($user !== null) {
        $address = $user->getAddress();
 
        if ($address !== null) {
            $country = $address->country;
        }
    }
}
```

With nullsafe operator, this whole code can be written in one line as `$session?->user?->getAddress()?->country`. Complete code will be:

**File: examples/NullsafeOperator/Nullsafe.php**

```php
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
```
