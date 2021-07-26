<?php


namespace App\Interfaces;


interface IRedisKeyGenerate
{
    public function keyGenerate(string $slug): string;
}
