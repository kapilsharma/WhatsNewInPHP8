## Function `str_starts_with` and `str_ends_with`

> RFC: [https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions](https://wiki.php.net/rfc/add_str_starts_with_and_ends_with_functions)

str_starts_with checks if a string begins with another string and returns a boolean value (true/false) whether it does.

str_ends_with checks if a string ends with another string and returns a boolean value (true/false) whether it does. 

Syntax

```php
str_starts_with ( string $haystack , string $needle ) : bool
str_ends_with ( string $haystack , string $needle ) : bool
```

Example (Taken from RFC)

```php
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
```
