<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class UsageLimitService
{
    private const FREE_DAILY_LIMIT = 3;
    private const CACHE_EXPIRATION = 86400; // 24 hours

    private $cache;
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->cache = new FilesystemAdapter('usage_limits');
    }

    public function canProcess(): bool
    {
        if ($this->isAuthenticated()) {
            return true;
        }

        return $this->getFreeUsageCount() < self::FREE_DAILY_LIMIT;
    }

    public function incrementUsage(): void
    {
        if ($this->isAuthenticated()) {
            return;
        }

        $ip = $this->getClientIp();
        $cacheKey = 'free_usage_' . $ip;
        
        $cacheItem = $this->cache->getItem($cacheKey);
        if (!$cacheItem->isHit()) {
            $cacheItem->set(1);
            $cacheItem->expiresAfter(self::CACHE_EXPIRATION);
        } else {
            $cacheItem->set($cacheItem->get() + 1);
        }
        
        $this->cache->save($cacheItem);
    }

    public function getRemainingFreeUsage(): int
    {
        if ($this->isAuthenticated()) {
            return PHP_INT_MAX;
        }

        return max(0, self::FREE_DAILY_LIMIT - $this->getFreeUsageCount());
    }

    private function getFreeUsageCount(): int
    {
        $ip = $this->getClientIp();
        $cacheKey = 'free_usage_' . $ip;
        
        $cacheItem = $this->cache->getItem($cacheKey);
        return $cacheItem->isHit() ? $cacheItem->get() : 0;
    }

    private function isAuthenticated(): bool
    {
        $request = $this->requestStack->getCurrentRequest();
        return $request && $request->getSession()->get('_security_main') !== null;
    }

    private function getClientIp(): string
    {
        $request = $this->requestStack->getCurrentRequest();
        return $request ? $request->getClientIp() : '127.0.0.1';
    }
} 