<?php

declare(strict_types=1);

namespace HellPat\Enum;

use function assert;

/**
 * @psalm-immutable
 */
abstract class Option
{
    /** @var array<string, self> */
    private static $enumRegistry = [];

    /** @var string */
    private $optionId;

    /**
     * @param mixed ...$args
     */
    protected function __construct(string $name, ...$args)
    {
        $this->optionId = $name;
    }

    /**
     * @param mixed ...$constructorArguments
     *
     * @return static
     */
    final protected static function getInstance(string $name, ...$constructorArguments)
    {
        if ($constructorArguments !== []) {
            return self::register(new static($name, ...$constructorArguments));
        }

        return self::register(new static($name));
    }

    /**
     * @return static
     */
    final private static function register(Option $option)
    {
        assert($option->optionId !== '');

        if (isset(self::$enumRegistry[$option->optionId])) {
            //phpcs:ignore SlevomatCodingStandard.Operators.DisallowEqualOperators.DisallowedEqualOperator
            if (self::$enumRegistry[$option->optionId] != $option) {
                throw InvalidOption::sameNameButNotEqual();
            }

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
