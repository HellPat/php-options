<?php

declare(strict_types=1);

namespace HellPat\Enum;

use HellPat\Enum\Stubs\OptionStub;
use HellPat\Enum\Stubs\ExtendingOptionStub;
use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress UnusedClass
 * @codeCoverageIgnore
 */
final class OptionTest extends TestCase
{
    /**
     * @test
     */
    function strict_comparison_between_objects_possible(): void
    {
        self::assertSame(OptionStub::SUCCESS(), OptionStub::SUCCESS());
        self::assertNotSame(OptionStub::SUCCESS(), OptionStub::FAILURE());
        self::assertNotEquals(OptionStub::SUCCESS(), OptionStub::FAILURE());
    }

    /**
     * @test
     */
    function allows_extending_enums_with_name_interferred_from_method_name(): void
    {
        self::assertInstanceOf(OptionStub::class, ExtendingOptionStub::THE_LIMBUS());
    }

    /**
     * @test
     */
    function overwritten_constructors_still_equal(): void
    {
        self::assertSame(OptionStub::SUCCESS(), ExtendingOptionStub::SUCCESS());
        self::assertSame(ExtendingOptionStub::SUCCESS(), ExtendingOptionStub::SUCCESS());
    }

    /**
     * @test
     */
    function it_has_a_string_representation(): void
    {
        self::assertSame('SUCCESS', OptionStub::SUCCESS()->optionId());
        self::assertSame('FAILURE', OptionStub::FAILURE()->optionId());
        self::assertSame('camelFailure', OptionStub::camelFailure()->optionId());
        self::assertSame('small_snake_failure', OptionStub::small_snake_failure()->optionId());
        self::assertSame('SUCCESS', ExtendingOptionStub::SUCCESS()->optionId());
    }

    /**
     * @test
     */
    function it_can_be_reconstructed_by_name(): void
    {
        self::assertSame(OptionStub::SUCCESS(), OptionStub::fromOptionId('SUCCESS'));
        self::assertSame(OptionStub::SUCCESS(), ExtendingOptionStub::fromOptionId('SUCCESS'));
        self::assertSame(ExtendingOptionStub::SUCCESS(), ExtendingOptionStub::fromOptionId('SUCCESS'));
    }

    /**
     * @test
     */
    function prevents_cloning(): void
    {
        $this->expectExceptionObject(CloningNotAllowed::useNewInstanceInstead());

        clone OptionStub::SUCCESS();
    }
}
