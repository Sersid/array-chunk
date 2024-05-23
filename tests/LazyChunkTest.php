<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

#[TestDox('Tests for \Samson\array_chunk() function')]
final class LazyChunkTest extends TestCase
{
    public static function dataProvider(): iterable
    {
        yield [
            [],
            50,
            false,
        ];

        yield [
            [],
            50,
            true
        ];

        yield [
            range(1, 25),
            50,
            false,
        ];

        yield [
            range(1, 25),
            50,
            true,
        ];

        yield [
            range(1, 50),
            50,
            false,
        ];

        yield [
            range(1, 50),
            50,
            true,
        ];

        yield [
            range(1, 100),
            50,
            false,
        ];

        yield [
            range(1, 100),
            50,
            true,
        ];

        yield [
            range(1, 120),
            50,
            false,
        ];

        yield [
            range(1, 120),
            50,
            true,
        ];

        yield [
            array_combine(range('a', 'z'), range(1, 26)),
            30,
            false,
        ];

        yield [
            array_combine(range('a', 'z'), range(1, 26)),
            30,
            true,
        ];

        yield [
            array_combine(range('a', 'z'), range(1, 26)),
            13,
            false,
        ];

        yield [
            array_combine(range('a', 'z'), range(1, 26)),
            13,
            true,
        ];
    }

    #[DataProvider('dataProvider')]
    public function test(array $array, int $length = 50, bool $preserve_keys = false): void
    {
        $result = lazy_chunk($array, $length, $preserve_keys);

        assertSame(
            array_chunk($array, $length, $preserve_keys),
            iterator_to_array($result)
        );
    }
}
