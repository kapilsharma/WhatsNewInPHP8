# Change log

This file contains the log of what was changed in which version

# version1.0.0

This is the version of ebook, to be distributed during Laravel-Nagpur meetup on November 27th, 2020. `[*]` represent done and `[ ]` represent planned but not completed. Following things were added to the book version 1.0.0. 

- 001. Introduction
- 100. Major new changes
    - [*] 101 Union Types
    - [*] 102 The nullsafe operator
    - [*] 103 Named arguments
    - [*] 104 Attributes
    - [*] 105 Class constructor property promotion
    - [*] 106 Static return
    - [*] 107 Match Expressions
    - [*] 108 Mixed types
    - [*] 109 throw expression
    - [ ] 110 Weak maps
    - [*] 111 Stringable interface
    - [*] 112 Validation for abstract trait methods
- 200 New functions
    - [*] 201 str_contains
    - [*] 202 str_starts_with & str_ends_with
    - [*] 203 get_debug_type
    - [*] 205 fdiv
- 300 Syntax changes
    - [*] 301 object::class
    - [*] 302 Non-capturing catches
    - [*] 303 Allow trailing comma in parameter list
- 400 Breaking changes
- 500 Language internal improvement
     - JIT
     - Inheritance with private methods

### New functions
- New `str_contains` function
- New `fdiv` function
- New `get_debug_type` function
- New `preg_last_error_msg` function
- `::class` magic constant is now supported on objects
- New `ValueError` Error Exception
- New `PhpToken` Tokenizer class
- New `str_starts_with` and `str_ends_with` functions
- New `mixed` pseudo type
- New `get_resource_id` function
- New `DateTime/DateTimeImmutable::createFromInterface()` methods
- New `p` date format for UTC `Z` time zone designation
- Built-in web server supports dynamic port selection
- New `Stringable` interface
- New `%h` and `%H` `printf` specifiers
- New `*` precision and width modifiers in `printf`
- Stack trace as string - Parameter max length is configurable

### Syntax/Functionality Changes

- Internal function warnings now throw `TypeError` and `ValueError` exceptions
- Expressions can now `throw` Exceptions
- JSON extension is always available
- `catch` exceptions only by type
- `+`/`-` operators take higher precedence when used with concat (`.`) operator
- `CurlHandle` class objects replace curl handlers
- Fatal errors on incompatible method signatures
- Disabled functions behave as if they do not exist
- `GdImage` class objects replace GD image resources
- Assertions throw exceptions by default
- Sockets extension resources (`Socket` and `AddressInfo`) are class objects
- `crypt()` function requires `$salt` parameter
- GD Extension: Windows DLL file name changed from `php_gd2.dll` to `php_gd.dll`
- PHP Startup Errors are displayed by default
- `substr`, `iconv_substr`, `grapheme_substr` return empty string on out-of-bound offsets
- Class magic method signatures are strictly enforced
- Locale-independent `float` to `string` casting
- Calling non-static class methods statically result in a fatal error
- Inheritance rules are not applied to `private` class methods
- Default error reporting is set to `E_ALL`
- Apache Handler: Module name and file path changes
- PDO: Default error mode set to exceptions
- `@` Error Suppression operator does not silent fatal errors

### Deprecations

- Deprecate required parameters after optional parameters in function/method signatures
- `ReflectionParameter::getClass())`, `::isArray()`, and `::isCallable()` methods deprecated
- Disabled functions: Reflection and `get_defined_functions()` deprecations
- `libxml_disable_entity_loader` function is deprecated
- PostgreSQL: Several aliased functions are deprecated
- Removed Features and Functionality
- XMLRPC extension is moved to PECL
- `FILTER_FLAG_SCHEME_REQUIRED` and `FILTER_FLAG_HOST_REQUIRED` flags are removed

### Revisit

- Create DateTime objects from interface
- Object implementation of token_get_all()
- Variable syntax tweaks
