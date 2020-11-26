## Function `get_debug_type`

> RFC: [https://wiki.php.net/rfc/get_debug_type](https://wiki.php.net/rfc/get_debug_type)

PHP already have `[gettype](https://www.php.net/manual/en/function.gettype.php)` since version 4. It returns the type of a variable for a given variable.

PHP 8 introduced new function `get_debug_type`, it will be same as `gettype` + it will also work on objects. Example:

**File: examples/NewFunctions/get_debug_type.php**

```php
class ExampleClass { }

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
```

Possible output for `get_debug_type` and `gettype` for different inputs can be seen at RFC.	
