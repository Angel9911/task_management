<?php

namespace App\Config\Cache;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class CacheConfig
{
    private CacheInterface $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    public function setCacheValue(string $key, $value, int $ttl = 3600): void
    {
        $this->cache->get($key, function (ItemInterface $item) use ($value, $ttl) {
            $item->expiresAfter($ttl);
            return $value;
        });
    }

    public function getCacheValue(string $key)
    {
        return $this->cache->get($key, function () {
            return null;
        });
    }
}