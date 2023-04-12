<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'driver' => 'file', // puedes usar file, redis, memcached, etc.
    'path' => APPPATH . 'cache/', // ruta a la carpeta de cache, dentro de la carpeta application/
    'redis' => array(
        'host' => '127.0.0.1',
        'port' => 6379,
        'password' => '',
        'timeout' => 0,
        'database' => 'default'
    ),
    'memcached' => array(
        'host' => '127.0.0.1',
        'port' => 11211,
        'weight' => 1
    )
);

?>