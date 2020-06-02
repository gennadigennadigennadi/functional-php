<?php

declare(strict_types=1);

namespace Gennadigennadigennadi\Functional\Tests;

use Gennadigennadigennadi\Functional\Memoization;
use Gennadigennadigennadi\Functional\Memoization2;
use PHPUnit\Framework\TestCase;
use Gennadigennadigennadi\Functional;

final class MemoizationTest extends TestCase
{
    public function test_memoize_internal_function_return_value(): void
    {
        $memoizedAdd = Functional\memoize($this->sum());

        $this->assertEquals(3, $memoizedAdd(1, 2));
        $this->assertEquals(3, $memoizedAdd(1, 2));
    }

    public function test_memoize2_internal_function_return_value(): void
    {
        $memoizedAdd = new Memoization2($this->sum());

        $this->assertEquals(3, $memoizedAdd(2, 1));
        $this->assertEquals(3, $memoizedAdd(2, 1));
    }

    public function test_memoize_function_return_value(): void
    {
        $memoizedAdd = (new Memoization())($this->sum());

        $this->assertEquals(3, $memoizedAdd(1, 2));
        $this->assertEquals(3, $memoizedAdd(1, 2));
    }

    private function sum(): callable
    {
        return fn (int $a, int $b) => $a + $b;
    }
}
