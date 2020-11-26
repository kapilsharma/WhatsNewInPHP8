## Allowing `::class` on objects

> RFC: [https://wiki.php.net/rfc/class_name_literal_on_object](https://wiki.php.net/rfc/class_name_literal_on_object)

With PHP 8, we can now use `::class` on objects.

Till PHP 7, `::class` was possible only on a class name. To get a class of an object, we need to call a function `get_class($object)`. Now with PHP 8, we can do `$object::class`.
