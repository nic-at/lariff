<?php

namespace Nicat\Lariff;

use Heise\Shariff\CacheInterface;
use Illuminate\Config\Repository as LaravelConfig;
use Illuminate\Cache\Repository as LaravelCache;

/**
 * Class Cache
 * Heise/Shariff Cache Implementation for Laravel Cache
 *
 * @package Nicat\Lariff
 */
class Cache implements CacheInterface
{
    /**
     * @var string
     */
    protected $defaultCache;

    /**
     * Prefix for cache keys
     *
     * @var string
     */
    protected $cachePrefix;

    /**
     * Time to live for cache items
     *
     * @var int
     */
    protected $cacheTtl;

    /**
     * @var LaravelCache
     */
    protected $cache;

    /**
     * @var LaravelConfig
     */
    protected $config;

    /**
     * Cache constructor.
     *
     * @param LaravelConfig $lvConfig
     * @param LaravelConfig $lvCache
     */
    public function __construct(LaravelConfig $config, LaravelCache $cache)
    {
        if ($config->get('cache.default') === '' || $config->get('lariff.cache.prefix') === '') {
            throw new \InvalidArgumentException('Either you didn\'t configure a default cache, or no cache key prefix');
        }
        $this->cachePrefix = $config->get('cache.prefix') . '-' . $config->get('lariff.cache.prefix');
        $this->config = $config;
        $this->cache = $cache;
    }
    /**
     * Set cache entry
     *
     * @param string $key
     * @param string $content
     *
     * @return void
     */
    public function setItem($key, $content)
    {
        $key = $this->getKey($key);
        $ttl = $this->config->get('lariff.cache.ttl');
        $this->cache->add($key, $content, $ttl);
    }
    /**
     * Calculates the internal cache key
     *
     * @param string $key
     *
     * @return string
     */
    protected function getKey($key)
    {
        return $this->cachePrefix . '-' . $key;
    }
    /**
     * Get cache entry
     *
     * @param string $key
     *
     * @return string
     */
    public function getItem($key)
    {
        $key = $this->getKey($key);
        return $this->cache->get($key);
    }
    /**
     * Check if cache entry exists
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasItem($key)
    {
        $key = $this->getKey($key);
        return $this->cache->has($key);
    }
}