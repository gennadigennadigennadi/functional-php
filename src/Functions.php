<?php

namespace Gennadigennadigennadi\Functional;

function add(int $a): callable
{
    return fn (int $b): int => $a + $b;
}

function add_long(int $a): callable
{
    return static function (int $b) use ($a): int {
        return $a + $b;
    };
}

function memoize(callable $fn): callable
{
    return static function (...$args) use ($fn) {
        static $cache = [];

        $key = serialize($args);

        if (!isset($cache[$key])) {
            $cache[$key] = $fn(...$args);
        }

        return $cache[$key];
    };
}

function compose(callable ...$fns): callable
{
    return function ($x) use ($fns) {
        // always work with copies instead of reference
        $ret = is_object($x) ?  clone ($x) : $x;

        foreach ($fns as $fn) {
            $ret = $fn($ret);
        }

        return $ret;
    };
}
