<?php

declare(strict_types=1);

namespace HellPat\Enum;

use function assert;

trait Nameable
{
    final public function toString(): string
    {
        return $this->name;
    }

    final public static function fromString(string $name): self
    {
        assert($name !== '');

        $instance = static::$name();
        assert($instance instanceof self);

        return $instance;
    }
}
