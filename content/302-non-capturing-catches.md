## Non-capturing catches

PHP, till version 7, requires to capture the exception being caught to a variable.

```php
try {
    foo();
} catch (SomeException $ex) {
    die($ex->getMessage());
}
```

In the above case, we are using `$ex`. However, even if we do not need to use an exception object, we still needed to define it in PHP 7 and earlier versions like

```php
try {
    changeImportantData();
} catch (PermissionException $ex) {
    echo "You don't have permission to do this";
}
```

With PHP 8, if we do not want to use a variable, we need not assign it to a variable. Example

```php
try {
    changeImportantData();
} catch (PermissionException) { // The intention is clear: exception details are irrelevant
    echo "You don't have permission to do this";
}
```
