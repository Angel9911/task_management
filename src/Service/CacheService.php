<?php

namespace App\Service;

interface CacheService
{
    public function set(string $key, $value, int $ttl = 3600);

    public function get(mixed $key, $default = null);

    public function delete(string $key): void;

}