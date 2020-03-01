<?php


namespace App\Interfaces;


interface ApiHttpInterface
{
    public function getBasic(string $param, string $value);
}