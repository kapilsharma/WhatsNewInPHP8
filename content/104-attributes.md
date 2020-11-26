## Attributes

> RFC: [https://wiki.php.net/rfc/attributes_v2](https://wiki.php.net/rfc/attributes_v2)

What is metadata?

In programming, metadata is a `data that defines another data`, on in other words `data about data`. Confusing, let's see an example:

```PHP
/**
 * Returns user model by user id
 * 
 * @param int $userId
 * @return User User Model fetched from user id.
 */
public function getUser($userId): User
{
    // Code to fetch and return user object.
}
```

You must have seen similar code, where we define some documentation in Docblock comment. Here, two important things are, `@param` and `@return`, what they are? It does not contribute anything to the code, but a document generator use them to generate documentation and IDE like PHP Storm will read this docblock to show a warning at the time of development. For example, if you write `$userService->getUser('Kapil')`, your IDE will show an error that `function expects int but we are passing a string`. This will happen even though we did not type-hint in method parameters but because IDE will do it by reading `@param`, where we defined `$userId` must be an integer.

Thus, these docblocks may define what our data is (data about the data) and known as metadata.

However, for PHP interpreter, this whole docblock is just a comment and will be ignored. In other words, there is no inbuilt support in PHP to define metadata. It will now change in PHP 8 with Attributes.

Attributes are also known as `annotations` in a few other languages. The attributes, in PHP 8 are supposed to add metadata to classes, methods, properties/variables, method parameters, etc. Let's check an example of where these properties can be used (Taken from RFC)

```php
#[ExampleAttribute]
class Foo
{
    #[ExampleAttribute]
    public const FOO = 'foo';
 
    #[ExampleAttribute]
    public $x;
 
    #[ExampleAttribute]
    public function foo(#[ExampleAttribute] $bar) { }
}
 
$object = new #[ExampleAttribute] class () { };
 
#[ExampleAttribute]
function f1() { }
 
$f2 = #[ExampleAttribute] function () { };
 
$f3 = #[ExampleAttribute] fn () => 1;
```

### Practical use of attributes

Let's see a test code to see the practical use of Attributes. We first need to define an attribute.

**File: examples/Attributes/TestAttribute.php**

```php
#[\Attribute]
class TestAttribute
{
    public string $testArgument;

    public function __construct(string $testArgument)
    {
        $this->testArgument = $testArgument;
    }
}
```

Here, we made a new `TestAttribute` class. It's a `custom attribute` as we defined it for our project/example. To define a custom attribute, we use a `global attribute`, which is `#[\Attribute]`. Custome attribute in our example is nothing but just a PHP class, attributed by `#[\Attribute]` and can store some extra data (`$testArgument`).

Now we defined a custom attribute, let's use it in a class.

**File: examples/Attributes/TestClass.php**

```php
#[TestAttribute('Some metadata for TestClass')]
class TestClass
{

}
```

Here we defined a TestClass and added our custom attribute (TestAttribute) with some more metadata (Some metadata for TestClass).

Now we are set to fetch this metadata through code.

**File: examples/Attributes/testing_attributes.php**

```php
$reflection = new \ReflectionClass(TestClass::class);
$classAttributes = $reflection->getAttributes();

echo $classAttributes[0]->newInstance()->testArgument . PHP_EOL;
```

Its output will be `Some metadata for TestClass`, which is our actual metadata. In our code, first line creates a `ReflectionClass` of `TestClass`. Later, we get the attributes of the class (TestClass) but `getAttributes` method, which will be an array. Since we have only one attribute, we are using the first array element, creating an instance of the class and fetching `testArgument`, which we defined while making the class.

### How it will impact me as a developer?

Well, for the majority of developers, it will not, at least not directly and immediately.

It will be used by IDE to fetch metadata in a standard way provided we define it. Also, after some time, newer versions of frameworks like Laravel, Symfony, Zend Framework, Yii, Cake PHP, Drupal, Magento etc will be using attributes to define a lot of things. Symfony already declared in [a blog post(https://symfony.com/blog/new-in-symfony-5-2-php-8-attributes)](https://symfony.com/blog/new-in-symfony-5-2-php-8-attributes) that starting version 5.2, they will be using attributes to define routes.

It is good to know about them so that they do not seem alien when first introduced in your favourite framework.
