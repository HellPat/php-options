<?php

declare(strict_types=1);

namespace HellPat\Enum;

use PHPUnit\Framework\TestCase;

/**
 * @psalm-suppress UnusedClass
 */
final class EnumTest extends TestCase
{
    /**
     * @test
     */
    function strict_comparison_between_objects_possible(): void
    {
        self::assertSame(EnumStub::SUCCESS(), EnumStub::SUCCESS());
        self::assertNotSame(EnumStub::SUCCESS(), EnumStub::FAILURE());
        self::assertNotEquals(EnumStub::SUCCESS(), EnumStub::FAILURE());
    }

    /**
     * @test
     */
    function allows_extending_enums_with_name_interferred_from_method_name(): void
    {
        self::assertInstanceOf(EnumStub::class, ExtendingEnumStub::THE_LIMBUS());
    }

    /**
     * @test
     */
    function overwritten_constructors_still_equal(): void
    {
        self::assertSame(EnumStub::SUCCESS(), ExtendingEnumStub::SUCCESS());
        self::assertSame(ExtendingEnumStub::SUCCESS(), ExtendingEnumStub::SUCCESS());
    }

    /**
     * @test
     */
    function it_has_a_string_representation(): void
    {
        self::assertSame('SUCCESS', EnumStub::SUCCESS()->toString());
        self::assertSame('FAILURE', EnumStub::FAILURE()->toString());
        self::assertSame('camelFailure', EnumStub::camelFailure()->toString());
        self::assertSame('small_snake_failure', EnumStub::small_snake_failure()->toString());
        self::assertSame('SUCCESS', ExtendingEnumStub::SUCCESS()->toString());
    }

    /**
     * @test
     */
    function it_can_be_reconstructed_by_name(): void
    {
        self::assertSame(EnumStub::SUCCESS(), EnumStub::fromString('SUCCESS'));
        self::assertSame(EnumStub::SUCCESS(), ExtendingEnumStub::fromString('SUCCESS'));
        self::assertSame(ExtendingEnumStub::SUCCESS(), ExtendingEnumStub::fromString('SUCCESS'));
    }
}
