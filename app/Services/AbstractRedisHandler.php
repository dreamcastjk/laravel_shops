<?php


namespace App\Services;


use App\Interfaces\IRedisKeyGenerate;
use Closure;
use Illuminate\Support\Facades\Redis;

abstract class AbstractRedisHandler
{
    protected string $key;
    private ?string $resultOfHandling;

    public function handler(string $slug, Closure $generate): bool
    {
        $this->keyGenerate($slug);

        if($this->redisEnableCheck()) {
            return true;
        } else {
            if($this->setKey($generate())){
                return true;
            }

            $this->resultOfHandling = $generate();

            return false;
        }
    }

    private function redisEnableCheck(): bool
    {
        if (true){
            return $this->keyExist();
        }

        return false;
    }

    private function keyExist(): bool
    {
        $this->resultOfHandling = Redis::get($this->key);
        if ($this->resultOfHandling){
            return true;
        }

        return false;
    }

    private function setKey(string $value): bool
    {
        $this->resultOfHandling = $value;
        if (Redis::set($this->key, $value, 'EX', config('cache.stores.redis.lifetime')))
        {
            return true;
        }

        return false;
    }

    public function getValue(): string
    {
        return $this->resultOfHandling;
    }

    protected abstract function keyGenerate(string $slug);
}
