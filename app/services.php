<?php

registerService('cache', function() {
    $cache = new \Memcached();
    $cache->addServer('memcached', 11211);
    return $cache;
});
