<?php

declare(strict_types=1);

namespace Gennadigennadigennadi\Functional;

final class Memoization2
{
    /** @var callable $fn */
    private $fn;

    /** @var mixed[] $cache */
    private $cache = [];

    public function __construct(callable $fn)
    {
        $this->fn = $fn;
    }

    /**
     * @param mixed ...$args
     *
     * @return mixed
     */
    public function __invoke(...$args)
    {
        $key = serialize($args);

        if (!array_key_exists($key, $this->cache)) {
            $this->cache[$key] = ($this->fn)(...$args);
        }

        return $this->cache[$key];
    }
}
