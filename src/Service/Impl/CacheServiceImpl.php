<?php

namespace App\Service\Impl;

use App\Service\CacheService;
use Psr\Cache\InvalidArgumentException;
use Redis;
use RedisException;

class CacheServiceImpl implements CacheService
{

    private Redis $redisClient;

    public function __construct(Redis $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    /**
     * @throws RedisException
     */
    public function set(string $key, $value, int $ttl = 3600)
    {

        $this->redisClient->set($key, $value);
    }

    /**
     * @throws RedisException
     */
    public function get(mixed $key, $default = null)
    {

        return $this->redisClient->get($key);
    }

    /**
     * @throws RedisException
     */
    public function delete(string $key): void
    {
        $this->redisClient->del($key);
    }
}