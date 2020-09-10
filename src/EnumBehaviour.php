<?php

declare(strict_types=1);

namespace HellPat\Enum;

use function assert;
use function debug_backtrace;
use function is_object;
use function is_string;

/**
 * @psalm-immutable
 */
trait EnumBehaviour
{
    /** @var array<string, self> */
    private static $enumRegistry = [];

    /** @var string */
    private $name;

    /** @var mixed */
    private $value;

    /**
     * @param float|int|object|null $value
     */
    final private function __construct(string $name, $value)
    {
        assert($name !== '');

        $this->name  = $name;
        $this->value = is_object($value) ? clone $value : $value;

        if (! $this->validValue($value)) {
            throw InvalidValue::definitionMissing();
        }
    }

    /**
     * @param mixed $value
     *
     * @return static
     */
    final protected static function choice($value = null)
    {
        $trace = debug_backtrace();
        $name  = $trace[1]['function'];
        assert(is_string($name));

        return self::$enumRegistry[$name] ?? self::$enumRegistry[$name] = new static($name, $value);
    }

    /**
     * @param float|int|object|null $value
     */
    protected function validValue($value): bool
    {
        return $value === null;
    }

    public function __clone()
    {
        throw CloningNotAllowed::useNewInstanceInstead();
    }
}
