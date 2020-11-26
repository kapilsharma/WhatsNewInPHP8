## Validation for abstract trait methods

> RFC: [https://wiki.php.net/rfc/abstract_trait_method_validation](https://wiki.php.net/rfc/abstract_trait_method_validation)

PHP 8 will strictly validate the signature of a trait's abstract method. Following code was possible in PHP 7:

**File: None. (Taken from RFC)**

```php
trait T {
    abstract public function test(int $x);
}
 
class C {
    use T;
 
    // Allowed in PHP 7 but not in PHP 8.
    public function test(string $x) {}
}
```

Now in PHP 8, above code is not valid because parameter type (int) of class `C` does not match with parameter type (string) of trait `T`. To make it work in PHP 8, parameter $x in C::test must be of type `int`. The following example will run in PHP 8

**File: None. (Improved RFC example)**

```php
trait T {
    abstract public function test(int $x);
}
 
class C {
    use T;
 
    // This will work in PHP 8.
    public function test(int $x) {}
}
```
