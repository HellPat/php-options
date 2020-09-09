<?php

declare(strict_types=1);

namespace HellPat\Enum;

final class ExtendingEnumStub extends EnumStub
{
    /**
     * @return static
     */
    public static function THE_LIMBUS()
    {
        return self::enum();
    }

    /**
     * @return static
     */
    public static function SUCCESS()
    {
        return self::enum();
    }
}
