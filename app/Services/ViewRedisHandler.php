<?php


namespace App\Services;


use App\Interfaces\IRedisKeyGenerate;

class ViewRedisHandler extends AbstractRedisHandler
{
    public function keyGenerate(string $slug): string
    {
        return "view:$slug";
    }
}
