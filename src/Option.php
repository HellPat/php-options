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

    /** @var string */
    private $optionId;

    protected function __construct(string $name)
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

    final protected static function nameFromBackTrace(): string
    {
        $name = debug_backtrace()[2]['function'];
        assert(is_string($name));

        return $name;
    }

    /**
     * @return static
     */
    final protected static function register(Option $option)
    {
        assert($option->optionId !== '');

        if (
            isset(self::$enumRegistry[$option->optionId])
            // phpcs:ignore SlevomatCodingStandard.Operators.DisallowEqualOperators.DisallowedEqualOperator
            && self::$enumRegistry[$option->optionId] == $option
        ) {
            return self::$enumRegistry[$option->optionId];
        }

        self::$enumRegistry[$option->optionId] = $option;

        return $option;
    }

    public function __clone()
    {
        throw CloningNotAllowed::useNewInstanceInstead();
    }

    public function toString(): string
    {
        return $this->optionId;
    }
}
