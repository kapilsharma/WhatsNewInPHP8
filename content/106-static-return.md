## Static return type

> RFC: [https://wiki.php.net/rfc/static_return_type](https://wiki.php.net/rfc/static_return_type)

Before we can understand `static return type`, we must first understand `Late static binding`, introduced in PHP 5.2. You are already aware of that, skip next section and go to `Static return type`.

### Late static binding

In PHP, if we want to return an instance of the same class, you must have used/seen `return new self` or `return new static`. What is the difference? Let's see an example to understand the difference:

**File: examples/StaticReturn/LateStaticBinding.php**

```php
class LateStaticBinding
{
    public static function getSelf()
    {
        return new self();
    }

    public static function getStatic()
    {
        return new static();
    }
}

class LateStaticBindingSubClass extends LateStaticBinding
{

}

echo get_class(LateStaticBindingSubClass::getSelf()) . PHP_EOL;
echo get_class(LateStaticBindingSubClass::getStatic()) . PHP_EOL;
echo get_class(LateStaticBinding::getSelf()) . PHP_EOL;
echo get_class(LateStaticBinding::getStatic()) . PHP_EOL;
```

Code is pretty simple; we defined a class `LateStaticBinding` which return its instance using `self` and `static`. Another class `LateStaticBindingSubClass` extends `LateStaticBinding` class, thus have access to parent class' methods.

Next, we are calling these methods in the instance of two classes. Output is:

```bash
LateStaticBinding
LateStaticBindingSubClass
LateStaticBinding
LateStaticBinding
```

Got the difference? When we use `self`, it always represents the class it is defined in, `LateStaticBinding` in our example. On the other hand, `static` represents the class from where it is called. Thus, it gives different results, depending on which class' instance it is called.

It is called `late static binding` because it waits until the call and creates/return an instance of the class from where it is called.

### Static return type

In later versions (after PHP 5.2), PHP allowed to have type hinting for the return type, but static could not be used there. This will now be possible in PHP 8. Following code demonstrate that, which will work only in PHP 8.

**File: examples/StaticReturn/StaticReturnType.php**

```php
class LateStaticBinding
{
    public static function getSelf(): self
    {
        return new self();
    }

    public static function getStatic(): static
    {
        return new static();
    }
}

class LateStaticBindingSubClass extends LateStaticBinding
{

}

echo get_class(LateStaticBindingSubClass::getSelf()) . PHP_EOL;
echo get_class(LateStaticBindingSubClass::getStatic()) . PHP_EOL;
echo get_class(LateStaticBinding::getSelf()) . PHP_EOL;
echo get_class(LateStaticBinding::getStatic()) . PHP_EOL;
```

Please note, we defined static return type in `public static function getStatic(): static`
