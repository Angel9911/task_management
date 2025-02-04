<?php

namespace App\utils;

use App\Constraints\CacheConstraints;
use App\Entity\Task;
use App\Service\CacheService;
use Redis;

final class RedisWrapper
{
    private static Redis $redis;

    public function __construct()
    {
    }

    public static function getInstance(): Redis
    {
        if (!isset(self::$redis)) {

            self::$redis = new Redis();
        }

        return self::$redis;
    }

    /**
     * @throws \RedisException
     */
    public static function updateCache(string $key, $value)
    {
        $redis = self::getInstance();

        $redis->set($key, ObjectMapper::mapObjectToJson($value));
    }

    /**
     * @throws \RedisException
     */
    public static function getCache(string $key): mixed
    {
        $redis = self::getInstance();

        $value = $redis->get($key);

        return $value ?? null;
    }
}