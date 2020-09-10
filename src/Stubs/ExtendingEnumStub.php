<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

final class ExtendingEnumStub extends EnumStub
{
    /**
     * @return static
     */
    public static function THE_LIMBUS()
    {
        return self::choice();
    }

    /**
     * @return static
     */
    public static function SUCCESS()
    {
        return self::choice();
    }
}
