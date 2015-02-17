<?php


namespace SimdesApp\Services;
use Illuminate\Cache\CacheManager;
class LaraCache implements LaraCacheInterface {

    protected $cache;

    public function __construct(CacheManager $cache)
    {
        $this->cache = $cache;
    }

    public function get($section, $key)
    {
        return $this->cache->section($section)->get($key);
    }

    public function put($section, $key, $value, $minutes)
    {
        if (is_null($minutes)) {
            $minutes = $this->minutes;
        }

        return $this->cache->section($section)->put($key, $value, $minutes);
    }

    public function has($section, $key)
    {
        return $this->cache->section($section)->has($key);
    }
} 