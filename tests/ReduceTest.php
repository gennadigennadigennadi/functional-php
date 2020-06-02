<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;

use function iter\reduce;
use function iter\reductions;

final class ReduceTest extends TestCase
{
    public function test_reduce(): void
    {
        $sum = reduce(
            fn ($accumulator, $value) => $accumulator + $value,
            $list = range(1, 10),
            $accumulator = 0
        );


        $this->assertEquals(55, $sum);
    }
}
