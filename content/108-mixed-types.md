## Mixed types

> RFC: [https://wiki.php.net/rfc/mixed_type_v2](https://wiki.php.net/rfc/mixed_type_v2)

PHP introduced scalar types in PHP 7, nullable in 7.1, object in 7.2, and lastly, union types in 8.0 as discussed above. Many developers started using these features and now type-hinting their parameters and return types.

However, we may still see this type-hinting is missing due to different reasons like:


- the type is a specific type, but the `programmer forgot` to declare it.
- the type is a specific type, but the programmer omitted it to keep `compatibility with an older PHP version`
- the `type is not currently expressible` in PHP's type system, and so no type could be specified.
- for return types, it is `not clear if the function will or will not return a value, other than null`.

 Reason for mixed types: A mixed type would allow people to add types to parameters, class properties and the function returns to indicate that the type information wasn't forgotten about, it just can't be specified more precisely, or the programmer explicitly decided not to do so.

 Because of the reasons above, it's a good thing the mixed type is added. Mixed itself means one of these types:

- array
- bool
- callable
- int
- float
- null
- object
- resource
- string

Example

```php
function someMethod(): mixed
```

Also note that since mixed already includes null, it's not allowed to make it nullable. The following will trigger an error:

```php
function someMethod(): ?mixed
```
