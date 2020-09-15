<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

/**
 * @psalm-immutable
 */
final class ExtendingOptionStub extends OptionStub
{
    /**
     * @return static
     */
    public static function THE_LIMBUS()
    {
        return self::getInstance(__METHOD__);
    }

    /**
     * @return static
     */
    public static function SUCCESS()
    {
        return self::getInstance(__METHOD__);
    }
}
