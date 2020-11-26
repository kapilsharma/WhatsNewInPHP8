## Throw expression

> RFC: [https://wiki.php.net/rfc/throw_expression](https://wiki.php.net/rfc/throw_expression)

Throw in PHP 7 and earlier version was a statement.

### Statement vs expression

- Stagement: A line of code which does something like `for`, `if`, etc.
- Expression: A line of code which evalute something like `1 + 2`, `$a == $b` (evalute true of false), etc.

### Throw statement

In PHP version 7 and earlier, the throw was a statement, that means, it cannot be used at places where expression is needed. Examples (Taken from RFC)

```php
// This was previously not possible since arrow functions only accept a single expression while throw was a statement.
$callable = fn() => throw new Exception();
 
// $value is non-nullable.
$value = $nullableValue ?? throw new InvalidArgumentException();
 
// $value is truthy.
$value = $falsableValue ?: throw new InvalidArgumentException();
 
// $value is only set if the array is not empty.
$value = !empty($array)
    ? reset($array)
    : throw new InvalidArgumentException();
```

Above lines of code will generate errors in PHP 7 and earlier.

PHP 8 made `throw statement` to `throw expression` and above code will work.

### Operator precedence

Now since throw is an expression (like operators), its position in operator precedence is important. Below examples (Taken from RFC) will explain operator precedence of throw expression.

```php
throw $this->createNotFoundException();
// Evaluated as
throw ($this->createNotFoundException());
// Instead of
(throw $this)->createNotFoundException();

throw static::createNotFoundException();
// Evaluated as
throw (static::createNotFoundException());
// Instead of
(throw static)::createNotFoundException();

throw $userIsAuthorized ? new ForbiddenException() : new UnauthorizedException();
// Evaluated as
throw ($userIsAuthorized ? new ForbiddenException() : new UnauthorizedException());
// Instead of
(throw $userIsAuthorized) ? new ForbiddenException() : new UnauthorizedException();
 
throw $maybeNullException ?? new Exception();
// Evaluated as
throw ($maybeNullException ?? new Exception());
// Instead of
(throw $maybeNullException) ?? new Exception();
 
throw $exception = new Exception();
// Evaluated as
throw ($exception = new Exception());
// Instead of
(throw $exception) = new Exception();
 
throw $exception ??= new Exception();
// Evaluated as
throw ($exception ??= new Exception());
// Instead of
(throw $exception) ??= new Exception();
 
throw $condition1 && $condition2 ? new Exception1() : new Exception2();
// Evaluated as
throw ($condition1 && $condition2 ? new Exception1() : new Exception2());
// Instead of
(throw $condition1) && $condition2 ? new Exception1() : new Exception2();
```

**Important:** Keeping throw at lower precedence will have a side effect, `throw between two short-circuit operators would not be possible without parentheses`. Example:

```php
$condition || throw new Exception('$condition must be truthy')
  && $condition2 || throw new Exception('$condition2 must be truthy');
// Evaluated as
$condition || (throw new Exception('$condition must be truthy') && $condition2 || (throw new Exception('$condition2 must be truthy')));
// Instead of
$condition || (throw new Exception('$condition must be truthy'))
  && $condition2 || (throw new Exception('$condition2 must be truthy'));
```

Although it will be a rare case, if we decide to use this, we must use proper parentheses.
