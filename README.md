# bearychat-laravel
bearychat notifer for Laravel

composer require lvqingan/bearychat-laravel dev-master

add service provider to config/app.php

Lvqingan\BearychatLaravel\BearychatLaravelServiceProvider::class,

add facade

'BearyChat' => Lvqingan\BearychatLaravel\Facade\BearyChat::class,

php artisan vendor:publis --tag=bearychat

put the hook url to config/bearychat.php

BearyChat::sendMessage('title', 'text');
