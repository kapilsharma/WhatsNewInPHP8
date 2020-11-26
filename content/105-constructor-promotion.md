## Constructor property promotion

> RFC: [https://wiki.php.net/rfc/constructor_promotion](https://wiki.php.net/rfc/constructor_promotion)

We have a similar thing in JavaScript, which allow writing less code, achieving the same result.

### Problem

(Taken from RFC) Currently, the definition of simple value objects requires a lot of boilerplate, because all properties need to be repeated at least four times. Consider the following simple class: 

```php
class Point {
    public float $x;
    public float $y;
    public float $z;
 
    public function __construct(
        float $x = 0.0,
        float $y = 0.0,
        float $z = 0.0,
    ) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }
}
```

The properties are repeated:

1. In the property declaration,
1. The constructor parameters, and
1. two times in the property assignment.

Additionally, the property type also repeated twice.

Especially for value objects, which commonly do not contain anything more than property declarations and a constructor, this results in a lot of boilerplate and makes changes more complicated and error-prone. 

### Solution

PHP 8 will now support `Constructor Property Promotion`. With this, the above code can be written as:

**File: examples/ConstructorPromotion/Point.php**

```php
class Point
{
    public function __construct(
        public float $x = 0.0,
        protected float $y = 0.0,
        private float $z = 0.0,
    ) {}

    public function print()
    {
        echo "Point($this->x, $this->y, $this->z)" . PHP_EOL;
    }
}

$point = new Point(1, 2.2);
$point->print();
```

Pretty, simple and a lot of fewer lines to achieve the same result, right?

The output of the above program is

```bash
Point(1, 2.2, 0)
```

In simple words, if we define access modifier (public, protected, private) in the class constructor, that variable will behave as an instance variable and we need not declare it separately as an instance variable.
