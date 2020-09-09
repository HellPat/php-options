<?php

declare(strict_types=1);

namespace HellPat\Enum;

use function assert;
use function debug_backtrace;
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

    final private function __construct(string $name)
    {
        assert($name !== '');
        $this->name = $name;
    }

    /**
     * @return static
     */
    final protected static function enum()
    {
        $trace = debug_backtrace();
        $name  = $trace[1]['function'];
        assert(is_string($name));

        return self::$enumRegistry[$name] ?? self::$enumRegistry[$name] = new static($name);
    }
}
