<?php

declare(strict_types=1);

namespace HellPat\Enum;

use HellPat\Enum\Stubs\ExtendingOptionStub;
use HellPat\Enum\Stubs\OptionStub;
use HellPat\Enum\Stubs\SettingsStub;
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
    function overwritten_constructors_equals_on_same_class_only(): void
    {
        self::assertNotSame(OptionStub::SUCCESS(), ExtendingOptionStub::SUCCESS());
        self::assertSame(ExtendingOptionStub::SUCCESS(), ExtendingOptionStub::SUCCESS());
    }

    /**
     * @test
     */
    function it_has_a_string_representation(): void
    {
        self::assertSame('HellPat\Enum\Stubs\OptionStub::SUCCESS', OptionStub::SUCCESS()->toString());
        self::assertSame('HellPat\Enum\Stubs\OptionStub::FAILURE', OptionStub::FAILURE()->toString());
        self::assertSame('HellPat\Enum\Stubs\OptionStub::camelFailure', OptionStub::camelFailure()->toString());
        self::assertSame(
            'HellPat\Enum\Stubs\OptionStub::small_snake_failure',
            OptionStub::small_snake_failure()->toString()
        );
        self::assertSame('HellPat\Enum\Stubs\ExtendingOptionStub::SUCCESS', ExtendingOptionStub::SUCCESS()->toString());
    }

    /**
     * @test
     */
    function prevents_cloning(): void
    {
        $this->expectExceptionObject(CloningNotAllowed::useNewInstanceInstead());

        clone OptionStub::SUCCESS();
    }

    /**
     * @test
     */
    function allows_more_details(): void
    {
        self::assertSame(SettingsStub::ORIGINAL(), SettingsStub::ORIGINAL());
        self::assertSame(SettingsStub::ORIGINAL()->details(), SettingsStub::ORIGINAL()->details());
    }

    /**
     * @test
     */
    function it_throws_on_invalid_register(): void
    {
        $this->expectExceptionObject(InvalidOption::sameNameButNotEqual());

        SettingsStub::SAME_NAME_BUT_DIFFERENT_VALUE_THEN_ORIGINAL();
        SettingsStub::ORIGINAL();
    }
}
