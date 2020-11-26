## Function `str_contains`

PHP 8 added a new function `str_contains`, which checks if a string is contained in another string and returns a boolean value (true/false) whether or not the string was found.

**Syntax**

```php
str_contains ( string $haystack , string $needle ) : bool
```

**Example**

```php
str_contains("abc", "a"); // true
str_contains("abc", "d"); // false
 
// $needle is an empty string
str_contains("abc", "");  // true
str_contains("", "");     // true
```

**Note from RFC:** As of PHP 8, the behaviour of "" in string search functions is well defined, and we consider "" to occur at every position in the string, including one past the end. As such, both of these will (or at least should) return true. The empty string is contained in every string.
