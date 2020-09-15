<?php

declare(strict_types=1);

namespace HellPat\Enum\Stubs;

use HellPat\Enum\Option;
use stdClass;

/**
 * @psalm-immutable
 */
final class SettingsStub extends Option
{
    /** @var object */
    private $details;

    private function __construct(string $name, object $details)
    {
        parent::__construct($name);
        $this->details = $details;
    }

    public static function GERMANY(): self
    {
        $options     = new stdClass();
        $options->id = 'GERMANY';

        return self::register(new self(self::nameFromBackTrace(), $options));
    }

    public static function AUSTRIA(): self
    {
        $options     = new stdClass();
        $options->id = 'AUSTRIA';

        return self::register(new self('GERMANY', $options));
    }

    public function details(): object
    {
        return $this->details;
    }
}
