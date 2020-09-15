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

    protected function __construct(string $name, object $details)
    {
        parent::__construct($name);
        $this->details = $details;
    }

    public static function ORIGINAL(): self
    {
        $options     = new stdClass();
        $options->id = 'GERMANY';

        return self::getInstance('original', $options);
    }

    public static function SAME_NAME_BUT_DIFFERENT_VALUE_THEN_ORIGINAL(): self
    {
        $options     = new stdClass();
        $options->id = 'AUSTRIA';

        return self::getInstance('original', $options);
    }

    public function details(): object
    {
        return $this->details;
    }
}
