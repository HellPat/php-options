# PHP-Options

Finite Options as objects in PHP.

## Motivation

### Option validity & Type-safety

When you use an `integer` or a `string` to change the featureset of your class/method you
have to protect you from passing in wrong arguments.

e.g. (from Symfony https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpKernel/Event/KernelEvent.php)

```php
/**
 * @param int $requestType The request type the kernel is currently processing; one of
 *                         HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST
 */
public function __construct(HttpKernelInterface $kernel, Request $request, ?int $requestType)
{
    $this->kernel = $kernel;
    $this->request = $request;
    $this->requestType = $requestType;
}

/**
 * Returns the request type the kernel is currently processing.
 *
 * @return int One of HttpKernelInterface::MASTER_REQUEST and
 *             HttpKernelInterface::SUB_REQUEST
 */
public function getRequestType()
{
    return $this->requestType;
}
```

The usage of constants make it more comfortable and typo safe for the developer.
But everyone knows that one person that just passes in `int = 3`.

This should throw an Exception. But do you really want to care about that?
Enum for the Rescue. Invalid Options are permitted *at construction*.
It's not possible to *make* an invalid option.

And then the type-declaration enforces validity!

Here a more type-safe example.

```diff
/**
- * @param int $requestType The request type the kernel is currently processing; one of
- *                         HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST
 */
-public function __construct(HttpKernelInterface $kernel, Request $request, ?int $requestType)
+public function __construct(HttpKernelInterface $kernel, Request $request, RequestType $requestType)
{
    $this->kernel = $kernel;
    $this->request = $request;
    $this->requestType = $requestType;
}

/**
 * Returns the request type the kernel is currently processing.
- *
- * @return int One of HttpKernelInterface::MASTER_REQUEST and
- *             HttpKernelInterface::SUB_REQUEST
 */
+public function getRequestType(): RequestType
{
    return $this->requestType;
}
```

An other example using colors:

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
In fact I'd never think of Enums in PHP without their existence. Kudos to all of you.

- https://github.com/myclabs/php-enum
- https://www.php.net/manual/de/class.splenum.php
- https://github.com/spatie/enum
- https://github.com/DASPRiD/Enum

## Inspirational posts

- https://beberlei.de/2009/08/31/enums-in-php.html
- https://stitcher.io/blog/enums-without-enums
