<?php

$router->respond('/v1/[:client]/[h:room].[json|txt:format]', function($request) {
    global $router;

    /** @var \Memcached $cache */
    $cache = $router->app()->cache;

    // Fetch existing clients
    $data = $cache->get($request->room);
    if (!$data) {
        $data = [];
        $cache->set($request->room, 60);
    }

    // Remove expired ones
    $current = time();
    foreach ($data as $index => $expire) {
        if ($expire<$current) unset($data[$index]);
    }

    // Upsert current one (valid for 30 sec)
    $data[$request->client] = $current + 30;

    // Store back in cache for up to 60 seconds
    $cache->replace($request->room, $data, 60);

    // Output current room members
    $keys = array_keys($data);
    switch($request->format) {
        case 'json':
            header('Content-Type: application/json');
            print(json_encode($keys));
            break;
        case 'txt':
            header('Content-Type: text/plain');
            print(implode("\n", $keys));
            break;
    }

});