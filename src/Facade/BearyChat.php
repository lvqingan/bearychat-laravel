<?php
namespace Lvqingan\BearychatLaravel\Facade;
use Illuminate\Support\Facades\Facade;

class BearyChat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bearychat-laravel';
    }
}
