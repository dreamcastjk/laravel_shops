<?php


namespace App\Interfaces;


use Closure;

interface IRedisHandler
{
    /**
     * Обработка кэшируемых данных.
     *
     * @param string $slug
     * @param Closure $cacheDataCallback
     * @return mixed
     */
    public function handler(string $slug, Closure $cacheDataCallback);
}
