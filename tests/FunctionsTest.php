<?php

declare(strict_types=1);

namespace Gennadigennadigennadi\Functional\Tests;

use PHPUnit\Framework\TestCase;
use Gennadigennadigennadi\Functional;

use function iter\map;

final class FunctionsTest extends TestCase
{
    public function test_add_long(): void
    {
        $adder = Functional\add_long(4);
        $this->assertEquals(8, $adder(4));
    }

    public function test_add(): void
    {
        $adder = Functional\add(4);
        $this->assertEquals(7, $adder(3));
    }


    public function test_map_over_with_add(): void
    {
        $list = [1, 3, 67, 42];
        $add5 = Functional\add(5);

        $this->assertSame([6, 8, 72, 47], iterator_to_array(map($add5, $list)));
    }
}
