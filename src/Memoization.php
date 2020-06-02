<?php

declare(strict_types=1);

namespace Gennadigennadigennadi\Functional;

final class Memoization
{
    public function __invoke(callable $fn): callable
    {
        return static function (...$args) use ($fn) {
            // has to be static 
            static $cache = [];
            $key = serialize($args);

            if (!array_key_exists($key, $cache)) {
                $cache[$key] = $fn(...$args);
            }

            return $cache[$key];
        };
    }
}
