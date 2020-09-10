<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

use HellPat\Enum\EnumBehaviour;

use function assert;

final class TaxStub
{
    use EnumBehaviour;

    /** @var TaxSettingsStub|null */
    public static $germanSettings;

    /**
     * @return static
     */
    public static function GERMANY()
    {
        if (self::$germanSettings === null) {
            self::$germanSettings = new TaxSettingsStub(19);
        }

        return self::choice(self::$germanSettings);
    }

    /**
     * @return static
     */
    public static function CAYMAN_ISLANDS()
    {
        return self::choice(new TaxSettingsStub(0));
    }

    /**
     * @param float|int|object|null $value
     */
    protected function validValue($value): bool
    {
        return $value instanceof TaxSettingsStub;
    }

    public function settings(): TaxSettingsStub
    {
        // TODO: can we get rid of this and still maintain 100% type interference?
        assert($this->value instanceof TaxSettingsStub);

        return $this->value;
    }
}
