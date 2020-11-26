## Named arguments (also known as Named parameters)

> RFC: [https://wiki.php.net/rfc/named_params](https://wiki.php.net/rfc/named_params)

(Taken from RFC) Named arguments allow passing arguments to a function based on the parameter name, rather than the parameter position. It makes the meaning of the argument self-documenting, make them order-independent, and allows skipping default values arbitrarily.

Let's check it with an example:

**File: examples/NamedArguments/NamedArguments.php**

```php
<?php
class NamedArguments
{
    public function printUserInfo(
        string $name,
        int $age,
        string $occupation,
    ) {
        echo "Hello $name, you are $age years old and work as $occupation." . PHP_EOL;
    }
}

$instance = new NamedArguments();

$instance->printUserInfo(
    name: 'Kapil',
    age: 38,
    occupation: 'Developer'
);

$instance->printUserInfo(
    occupation: 'Student',
    age: 8,
    name: 'Pari'
);
```

As seen in examples, with named parameters, we have given a name of each parameter and the order of parameters is no longer important. It also helps better-documented parameters right in the method signature.

It will also be helpful in case when we have one or more optional arguments. Let's update our example with some optional parameters:

**File: examples/NamedArguments/NamedArguments.php2**

```php
class NamedArguments2
{
    public function printUserInfo(
        string $name,
        int $age,
        string $occupation = '',
        string $company = '',
        string $school = ''
    ) {
        $output = "Hello $name, you are $age years old,";

        if ($occupation !== '') {
            $output .= " you are a $occupation";
        }

        if ($school !== '') {
            $output .= " and study in $school";
        }

        if ($company !== '') {
            $output .= " and work in $company";
        }

        echo $output . PHP_EOL;
    }
}

$instance = new NamedArguments2();

$instance->printUserInfo(
    name: 'Kapil',
    age: 38,
    occupation: 'Developer',
    company: 'Cactus Global'
);

$instance->printUserInfo(
    school: 'Some School',
    occupation: 'Student',
    age: 8,
    name: 'Pari'
);
```

As we can see in two function call, we can not only move the order of parameters, we also no longer need to provide the first optional argument if we need to give the second optional argument. If we have to call the same function in PHP 7, we would have to do

```php
$instance->printUserInfo('Kapil', 38, 'Developer', 'Cactus Global');
$instance->printUserInfo('Pari', 8, 'Student', '', 'Some School');
```

In the second call, even though we do not need company, we still have to pass an empty string in PHP 7 and earlier version.
