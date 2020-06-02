<?php

declare(strict_types=1);

namespace Gennadigennadigennadi\Functional\Tests;

use PHPUnit\Framework\TestCase;

use function Gennadigennadigennadi\Functional\add;
use function Gennadigennadigennadi\Functional\compose;

final class ComposeTest extends TestCase
{
    public function test_compose(): void
    {
        $doMath = compose(
            fn (int $x) => add(5)($x),
            fn (int $x) => pi() * $x,
            fn (float $x) => add(3)((int) $x)
        );

        $this->assertEquals(31, $doMath(4));
    }
}

