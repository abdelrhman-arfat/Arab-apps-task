<?php

namespace App\Service;

use Illuminate\Support\Facades\Cache;

class CacheService
{
  public static function setCacheKey($tableName, $filters)
  {
    return  $tableName . "_" . md5(json_encode($filters));
  }
  public static function getCacheWithTheKey($key)
  {
    return Cache::get($key);
  }

  public static function forget(string $key)
  {
    return Cache::forget($key);
  }

  public static function has(string $key)
  {
    return Cache::has($key);
  }
  public static function remember(string $key, int $ttl, \Closure $callback)
  {
    return Cache::remember($key, $ttl, $callback);
  }
}
