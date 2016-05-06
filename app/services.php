<?php

registerService('cache', function() {
    $cache = new \Memcached();
    $cache->addServer('127.0.0.1', 11211);
    return $cache;
});