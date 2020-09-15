# PHP-Options

Finite Options as objects in PHP.

## Motivation

tbd.

### Type safety

By representing your Options as Object, you can use Type-Declarations
and enforce strict types.

String-Options can be replaced with options - now it's impossible to pass in
invalid options. Using strings didn't validate that for us.

```diff
class Mixer {
    -static function mix(string $color1, string $color2): Color {}
    +static function mix(Color $color1, Color $color2): Color {}
}

-Mixer::mix('red', 'purple');
+Mixer::mix(Color::RED(), COLOR::PURPLE());

-Mixer::mix('yellowgreenlimebutter') // invalid strings where allowed before
```

### Strict comparison

This implementation provides a Registry for your options and fetches from there.
This is totally possible and convenient:

```php
Color::RED() === Color::RED() // returns `true`
```

## How to declare your Options

tbd.

## Naming-Convention

tbd.

## Comparison with other libraries

Other libraries have been released way earlier, are more stable and used.
In fact I'd never think auf Enums in PHP without there existence. Kudos to all of you.

### https://github.com/myclabs/php-enum

tbd.

### https://www.php.net/manual/de/class.splenum.php

tbd.

## Inspiration

- https://beberlei.de/2009/08/31/enums-in-php.html
- https://stitcher.io/blog/enums-without-enums
- https://github.com/myclabs/php-enum