## Stringable interface

> RFC: [https://wiki.php.net/rfc/stringable](https://wiki.php.net/rfc/stringable)

PHP 8 introduced a new interface `Stringable`.

```php
interface Stringable
{
   public function __toString(): string;
}
```

Usage example

```php
class ClassWithToString
{
    public function __toString(): string
    {
        return 'test string from ClassWithToString::__toString';
    }
}

function testStringable(string|Stringable $stringable) {
    echo "String is '$stringable'" . PHP_EOL;
}

testStringable(new ClassWithToString());
testStringable('Notmal string');
```

Output

```bash
String is 'test string from ClassWithToString::__toString'
String is 'Normal string'
```

Please note, we have not used `implements Stringable` in our class `ClassWithToString`. PHP 8 automatically add `implements Stringable` to any class that have `__toString()` method.
