# Breaking changes

Link any major version, PHP 8 also introduced some breaking changes. Thus, we need to look at them and fix our existing projects, before upgrading PHP to version 8 on the server.

Once PHP 8 is released, documentation will cover PHP 7 to PHP 8 migration guide, with breaking changes. However, until documentation is available in PHP manual, we can see it at [https://github.com/php/php-src/blob/PHP-8.0/UPGRADING#L20](https://github.com/php/php-src/blob/PHP-8.0/UPGRADING#L20)

## Consistent type errors for internal functions

> RFC: [https://wiki.php.net/rfc/consistent_type_errors](https://wiki.php.net/rfc/consistent_type_errors)

For user-defined functions, passing a parameter of illegal type results in a TypeError. For internal functions, the behaviour depends on multiple factors, but the default is to throw a warning and return null.

Example of user-defined function in PHP 7

```php
function foo(int $bar) {}
foo("not an int");
// TypeError: Argument 1 passed to foo() must be of the type int, string given
```

Example of internal function in PHP 7

```php
var_dump(strlen(new stdClass));
// Warning: strlen() expects parameter 1 to be string, object given
// NULL
```

However we can change this behaviour by using strict_types in PHP 7.

```php
declare(strict_types=1);
var_dump(strlen(new stdClass));
// TypeError: strlen() expects parameter 1 to be string, object given
```

**In PHP 8, internal parameter parsing APIs always generate a TypeError if parameter parsing fails.**

## Change Default PDO Error Mode

> RFC: [https://wiki.php.net/rfc/pdo_default_errmode](https://wiki.php.net/rfc/pdo_default_errmode)

The current default error mode for PDO is silent. This means that when an SQL error occurs, no errors or warnings may be emitted and no exceptions thrown unless the developer implements their own explicit error handling.

This causes issues for new developers because the only errors they often see from PDO code are knock-on errors such as “call to fetch() on non-object” - there's no indication that the SQL query (or other action) failed or why.

## Change the precedence of the concatenation operator

> RFC: [https://wiki.php.net/rfc/concatenation_precedence](https://wiki.php.net/rfc/concatenation_precedence)

 It's been a long standing issue that an (unparenthesized) expression with '+', '-' and '.' evaluates left-to-right.

```PHP
echo "sum: " . $a + $b;
 
// current behavior: evaluated left-to-right
echo ("sum: " . $a) + $b;
 
// desired behavior: addition and subtraction have a higher precendence
echo "sum :" . ($a + $b);
```

## Stricter type checks for arithmetic/bitwise operators

RFC: [https://wiki.php.net/rfc/arithmetic_operator_type_checks](https://wiki.php.net/rfc/arithmetic_operator_type_checks)

This RFC proposes to throw a TypeError when arithmetic or bitwise operator is applied to an array, resource or (non-overloaded) object. The behaviour of scalar operands (like null) remains unchanged

This is not reasonable behaviour:

```php
var_dump([] % [42]);
// int(0)
```

## Saner numeric strings

> RFC: [https://wiki.php.net/rfc/saner-numeric-strings](https://wiki.php.net/rfc/saner-numeric-strings)

The PHP language has a concept of numeric strings, strings which can be interpreted as numbers.

A string can be categorised in three ways

- A numeric string is a string containing only a number, optionally preceded by whitespace characters. For example, "123" or " 1.23e2".
- A leading-numeric string is a string that begins with a numeric string but is followed by non-number characters (including whitespace characters). For example, "123abc" or "123 ".
- A non-numeric string is a string which is neither a numeric string nor a leading-numeric string.

PHP 8 will unify the various numeric string modes into a single concept: Numeric characters only with both leading and trailing whitespace allowed. Any other type of string is non-numeric and will throw TypeErrors when used in a numeric context.

## Saner string to number comparisons

> RFC: [https://wiki.php.net/rfc/string_to_number_comparison](https://wiki.php.net/rfc/string_to_number_comparison)

Comparisons between strings and numbers using == and other non-strict comparison operators currently work by casting the string to a number, and subsequently performing a comparison on integers or floats. This results in many surprising comparison results, the most notable of which is that 0 == "foobar" returns true.

The single largest source of bugs is likely the fact that `0 == "foobar"` returns true. Quite often this is encountered in cases where the comparison is implicit, such as in_array() or switch statements. A classic example: 

```php
$validValues = ["foo", "bar", "baz"];
$value = 0;
var_dump(in_array($value, $validValues)); // bool(true) WTF???
```

PHP 8 will give the string to number comparisons a more reasonable behaviour: When comparing to a numeric string, use a number comparison (same as now). Otherwise, convert the number to string and use a string comparison. Examples:

```PHP
var_dump(0 == "0");      // PHP 7: true; PHP 8: true
var_dump(0 == "0.0");    // PHP 7: true; PHP 8: true
var_dump(0 == "foo");    // PHP 7: true; PHP 8: false
var_dump(0 == "");       // PHP 7: true; PHP 8: false
var_dump(42 == "   42"); // PHP 7: true; PHP 8: true
var_dump(42 == "42foo"); // PHP 7: true; PHP 8: false
```

## Make sorting stable

> RFC: [https://wiki.php.net/rfc/stable_sorting](https://wiki.php.net/rfc/stable_sorting)

Sorting functions in PHP are currently unstable, which means that the order of “equal” elements is not guaranteed. Example:

```php
$array = [
    'c' => 1,
    'd' => 1,
    'a' => 0,
    'b' => 0,
];
asort($array);
```

With stable sorting, we might expect output to be:

```bash
['a' => 0, 'b' => 0, 'c' => 1, 'd' => 1]
```

However, since PHP 7 sorting is currently unstable, it could be one of the following as well

```bash
['b' => 0, 'a' => 0, 'c' => 1, 'd' => 1]
['a' => 0, 'b' => 0, 'd' => 1, 'c' => 1]
['b' => 0, 'a' => 0, 'd' => 1, 'c' => 1]
```

PHP 8 will have stable sorting for sorting functions like: sort, rsort, usort, asort, arsort, uasort, ksort, krsort, uksort, array_multisort.

## Reclassifying engine warnings

> RFC: [https://wiki.php.net/rfc/engine_warnings](https://wiki.php.net/rfc/engine_warnings)

A lot of warning in PHP 7 will now be converted to Errors (Mostly Error exception or Type Error)

Please check the RFC to see changes in all warnings of PHP 7 which are converted to Errors in PHP 8.


