<?php

declare(strict_types=1);

namespace HellPat\Enum;

use LogicException;

final class CloningNotAllowed extends LogicException
{
    public static function useNewInstanceInstead(): self
    {
        return new self('"clone" is not necessary, just use the static constructor again to get the same instance.');
    }
}
