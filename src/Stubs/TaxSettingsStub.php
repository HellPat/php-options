<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

final class TaxSettingsStub
{
    /**
     * @readonly
     * @var int
     */
    public $vat;

    public function __construct(int $vat)
    {
        $this->vat = $vat;
    }
}
