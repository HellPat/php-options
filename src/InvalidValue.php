<?php

declare(strict_types=1);

namespace HellPat\Enum;

use InvalidArgumentException;

use function sprintf;

final class InvalidValue extends InvalidArgumentException
{
    public static function definitionMissing(): self
    {
        return new self(sprintf('You have to explicitly allow the value type by overwriting the "validValue" method.'));
    }
}
