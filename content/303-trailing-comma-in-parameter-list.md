## Allow a trailing comma in the parameter list

> RFC: [https://wiki.php.net/rfc/trailing_comma_in_parameter_list](https://wiki.php.net/rfc/trailing_comma_in_parameter_list)

PHP already supported adding a comma after the last element of an array like

```php
$exampleArray = [
    'a',
    'b',
    'c', // Comma after lase element is allowed in PHP
];
```

Now with PHP 8, it is also possible with the parameter list of a method.

```php
new Uri(
    $scheme,
    $user,
    $pass,
    $host,
    $port,
    $path,
    $query,
    $fragment, // <-- Huh, this is allowed!
);
```
