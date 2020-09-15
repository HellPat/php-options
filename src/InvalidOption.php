<?php

declare(strict_types=1);

namespace HellPat\Enum;

use LogicException;

class InvalidOption extends LogicException
{
    public static function sameNameButNotEqual(): self
    {
        return new self('Option with name already registered, but values differ.');
    }
}
