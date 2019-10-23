<?php

namespace Dethan\AliyunSmsCore;

use Dethan\AliyunSmsCore\Regions\EndpointConfig;

//config http proxy
define('ENABLE_HTTP_PROXY', FALSE);
define('HTTP_PROXY_IP', '127.0.0.1');
define('HTTP_PROXY_PORT', '8888');


class Config
{
    private static $loaded = false;
    public static function load(){
        if(self::$loaded) {
            return;
        }
        EndpointConfig::load();
        self::$loaded = true;
    }
}