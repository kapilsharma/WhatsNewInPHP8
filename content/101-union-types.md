## Union types

> RFC: [https://wiki.php.net/rfc/union_types_v2](https://wiki.php.net/rfc/union_types_v2)

### History

Skip to title `Changes in PHP 8` if you are interested to see only the changes made in PHP 8.

### Dynamically typed language

PHP is a dynamically typed language, that means we can assign any data-type to any variable. Following code is perfectly fine in PHP:

**File: examples/UnionTypes/DynamicTypes.php**

```php
<?php

$intType = null; // Variable can be null, may be no problem.
echo "Value of variable is: $intType" . PHP_EOL;

$intType = 2; // Right and expected type.
echo "Value of variable is: $intType" . PHP_EOL;

$intType *= 1.4; // Wait, it will be 2.8 and PHP will cast it to a float, doesn't match with name of variable.
echo "Value of variable is: $intType" . PHP_EOL;

$intType = "Let's make it string, I don't care for types"; // Perfectly fine.
echo "Value of variable is: $intType" . PHP_EOL;
```

It runs perfectly fine with following output.

```bash
Value of variable is: 
Value of variable is: 2
Value of variable is: 2.8
Value of variable is: Let's make it string, I don't care for types
```

Since PHP is still supposed to be a dynamically typed language, PHP 8 kept this behaviour so we will be having the same output even in PHP 8.

Although many languages support dynamic types as it is easy to manage, there is a downside that we may accidentally change a variable type and introduce a bug.

PHP started fixing this problem and in PHP 5, we can define type-hinting in functions/methods. However, it was limited only to class names. PHP 7 allowed to type hint for internal data types. Following example demonstrate that.

**File: examples/UnionTypes/TypeHinting.php**

```php
class TypeHinting
{
    public $intType;

    public function __construct(int $intType)
    {
        $this->intType = $intType;
    }

    public function printValue()
    {
        echo 'Value of variable is ' . $this->intType . PHP_EOL;
    }
}

$instance = new TypeHinting(2);
$instance->printValue();

$instance->intType = 2.2;
$instance->printValue();
```

As shown in constructor `__construct(int $intType)`, we defined parameter must be of type integer. Thus, if we pass any non-integer parameter to the constructor, it will throw an error and the developer will immediately know and fix it.

It still did not solve the problem as our instance variable `intType` is public that means, we can still assign any value to it directly. We exactly did that in the line `$instance->intType = 2.2;` and now, it is a float. The correct way is, instance variables must be private or protected and must be managed by functions. Although not recommended, in rare cases, we might need to make an instance variable public. PHP fix that problem in version 7.4 with [typed properties (https://wiki.php.net/rfc/typed_properties_v2)](https://wiki.php.net/rfc/typed_properties_v2). With typed properties, we may rewrite the above example again.

**File: examples/UnionTypes/TypeHinting2.php**

```php
class TypeHinting2
{
    public int $intType;

    public function __construct(int $intType)
    {
        $this->intType = $intType;
    }

    public function printValue()
    {
        echo 'Value of variable is ' . $this->intType . PHP_EOL;
    }
}

$instance = new TypeHinting2(2);
$instance->printValue();

$instance->intType = 2.2;
$instance->printValue();

$instance->intType = "3.5 is a float with some extra string";
$instance->printValue();

$instance->intType = "Now we have a string that can't be casted to int";
$instance->printValue();
```

Here, we changed `public $intType;` to `public int $intType;`. With this, we tell PHP that instance variable `$intType` may contain only integer values. Let's see the output of the program before discussing it.

```bash
Value of variable is 2

Value of variable is 2

Notice: A non well formed numeric value encountered in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php on line 35
Value of variable is 3

PHP Fatal error:  Uncaught TypeError: Typed property TypeHinting2::$intType must be int, string used in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php:38
Stack trace:
#0 {main}
  thrown in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php on line 38
```

We first set an integer with `$instance = new TypeHinting2(2);` and output was as expected `Value of variable is 2`.

In next line, we set float value to the variable as `$instance->intType = 2.2;`. Here, PHP did the internal cast and made float to integer. Thus, output was even though not expected as human, it is expected `Value of variable is 2` (Not 2.2)

Next, we assign a string starting with a integer `$instance->intType = "3.5 is a float with some extra string";`. Now there is a problem but PHP still manage to cast it with notice but the program still executed and continued.

```bash
Notice: A non well formed numeric value encountered in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php on line 35
Value of variable is 3
```

**Important: In PHP 8, this will throw TypeError, not warning.**

In the end, we push PHP to its limit and assigned a string `$instance->intType = "Now we have a string that can't be cast to int";`. Now PHP cannot auto-cast it to an integer and finally throw an error and stop executing program.

```bash
Fatal error: Uncaught TypeError: Typed property TypeHinting2::$intType must be int, string used in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php:38
Stack trace:
#0 {main}
  thrown in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/TypeHinting2.php on line 38
```

Even though PHP is dynamically typed language, with above changes, it was making things more strict, to make it easy to identify possible bugs during development time only.

Everything comes at a price, with type-hinting, we faced a new problem as PHP does not support Method-overloading. Assume we need to make `add` function, which should work on both integer and float. In strictly types language, which supports overloading with different signature (method name with parameter list), the following code should be perfect.

**File: examples/UnionTypes/Overloading.php**

```php
Class Overloading
{
    public function add(int $number1, int $number2): int
    {
        return $number1 + $number2;
    }

    public function add(float $number1, float $number2): float
    {
        return $number1 + $number2;
    }
}

$instance = new Overloading();
echo '1 + 2 = ' . $instance->add(1, 2) . PHP_EOL;
echo '1.1 + 2.2 = ' . $instance->add(1.1, 2.2) . PHP_EOL;
```

However, PHP do not support method overloading thus above code throw following error

```bash
Fatal error: Cannot redeclare Overloading::add() in /home/kapil/dev/ebooks/WhatsNewInPHP8/examples/101-UnionTypes/Overloading.php on line 25
```

Although we can have a workaround of defining add with float and cast result to integer, it is not very convenient. Thus, PHP 8 comes with `Union Types`.

### Changes in PHP 8

With `Union Types`, we can define multiple type hinting for a variable as follow:

**File: examples/UnionTypes/Overloading.php**

```php
Class UnionTypes
{
    public function add(int|float $number1, int|float $number2): int|float
    {
        return $number1 + $number2;
    }
}

$instance = new UnionTypes();
echo '1 + 2 = ' . $instance->add(1, 2) . PHP_EOL;
echo '1.1 + 2.2 = ' . $instance->add(1.1, 2.2) . PHP_EOL;
```

Output

```bash
1 + 2 = 3
1.1 + 2.2 = 3.3
```

As seen in the above example, we type hinted $number1, $number2 and return type as `int|float`, which says it could be either integer or float.

One important thing to note, PHP 7.1 introduced [nullable types (https://www.php.net/manual/en/migration71.new-features.php)](https://www.php.net/manual/en/migration71.new-features.php), where we can define type as `?string` meant it is either String or null. It will not work with union types. However, we can achieve the same result with `string|null`.
