<?php


namespace App\Services;


class ViewRedisHandler extends AbstractRedisHandler
{
    protected function keyGenerate(string $slug)
    {
        $this->key = "view:$slug";
    }
}
