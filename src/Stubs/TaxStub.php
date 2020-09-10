<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

use HellPat\Enum\EnumBehaviour;

use function assert;

final class TaxStub
{
    use EnumBehaviour;

    /**
     * @return static
     */
    public static function GERMANY()
    {
        return self::choice(new TaxSettingsStub(19));
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
