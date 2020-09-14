<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

final class ExtendingOptionStub extends OptionStub
{
    /**
     * @return static
     */
    public static function THE_LIMBUS()
    {
        return self::createFromMethodName();
    }

    /**
     * @return static
     */
    public static function SUCCESS()
    {
        return self::createFromMethodName();
    }
}
