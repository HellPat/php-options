<?php

declare(strict_types=1);

namespace HellPat\Enum;

use function assert;
use function debug_backtrace;
use function is_string;

/**
 * @psalm-immutable
 */
abstract class Option
{
    /** @var array<string, self> */
    private static $enumRegistry = [];

    /**
     * @var string
     */
    private $optionId;

    private function __construct(string $name)
    {
        $this->optionId = $name;
    }

    /**
     * @return static
     */
    final protected static function createFromMethodName()
    {
        return self::register(new static(self::nameFromBackTrace()));
    }

    private static function nameFromBackTrace(): string
    {
        return debug_backtrace()[2]['function'];
    }

    private static function register(Option $option): Option
    {
        $name = $option->optionId();

        assert(is_string($name));
        assert($name !== '');

        return self::$enumRegistry[$name]
            ?? self::$enumRegistry[$name] = $option;
    }

    final public function optionId(): string
    {
        return $this->optionId;
    }

    final public static function fromOptionId(string $name): self
    {
        assert($name !== '');

        $instance = static::$name();
        assert($instance instanceof self);

        return $instance;
    }

    public function __clone()
    {
        throw CloningNotAllowed::useNewInstanceInstead();
    }
}
