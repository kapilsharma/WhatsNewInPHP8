## Match expression

**RFC: [https://wiki.php.net/rfc/match_expression_v2](https://wiki.php.net/rfc/match_expression_v2)**

PHP 8 is trying to reduce the line of code and match expression do so in switch cases. Consider this simple switch case example:

**File: examples/Match/Switch.php**

```php
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
```

A simple program and as you must have correctly expected, the output is `You do not like any primary colour.`

PHP 8 introduce a new `match` expression, which can achieve the same result as above. Let's see that:

**File: examples/Match/Match.php**

```php
function printFavoriteColor($colour)
{
    echo match ($colour) {
        'red' => 'Your favorite colour is Red.' . PHP_EOL,
        'blue' => 'Your favorite colour is Blue.' . PHP_EOL,
        'green' => 'Your favorite colour is Green.' . PHP_EOL,
        default => 'You do not like any primary colour.' . PHP_EOL,
    };
}

printFavoriteColor('Yellow');
```

Shorter code but it will have the same result.

### Strict type comparison

Switch loosely compare cases with `==`. Let's see an example.

**File: examples/Match/Switch2.php** (Example taken from RFC & slightly fixed)

```php
switch (false) {
    case 0:
      $result = "Oh no!\n";
      break;
    case false:
      $result = "This is what I expected\n";
      break;
}
echo $result;
```

At a first look, we might be expecting the result to be `This is what I expected` but we get the result as `Oh no!`. Reason is, `0 == false` returns true. Let's see the same example with the match, which does strict comparison `===`.

**File: examples/Match/Match2.php**

```php
echo match (false) {
    0 => "Oh no!\n",
    false => "This is what I expected\n",
};
```

It will return the expected output `This is what I expected`.

### No break needed

In switch, we need to `break` each case to stop further execution of switch. Let's check an example:

**File: examples/Match/Switch3.php**

```php
switch (1) {
    case 1:
    case 2:
        echo 'Number 1 or 2.' . PHP_EOL;
    case 3:
    case 4:
        echo 'Number 3 or 4.' . PHP_EOL;
}
```

What output are we expecting? Isn't it `Number 1 or 2.` but the output is

```bash
Number 1 or 2.
Number 3 or 4.
```

It's obvious as we forget to `break` before `case 3`. To fix it, we need to add break

**File: examples/Match/Switch4.php**

```php
switch (1) {
    case 1:
    case 2:
        echo 'Number 1 or 2.' . PHP_EOL;
        break; // Added this line
    case 3:
    case 4:
        echo 'Number 3 or 4.' . PHP_EOL;
}
```

Same example with match do not need break

**File: examples/Match/Match3.php**

```php
echo match (1) {
    1, 2 => 'Number for 1 and 2' . PHP_EOL,
    3, 4 => 'Number for 3 and 4' . PHP_EOL,
};
```

### Return value

In the above example, you may also have noticed that we need to do `echo` in each switch case. However, in case of a match, we echo only once before `match`.

This is due to the fact that switch simply executes the statements but match return the result of statements. This will be especially helpful when we need to return value from `match` in a function. With a switch, we need multiple returns or make a local variable and return the variable after the switch. With the match, we can simply do `return match(){}`.
