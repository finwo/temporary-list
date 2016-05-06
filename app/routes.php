<?php

$router->respond('/v1/[:room]/[:client]', function($request) {

    printf("%s<br />\n", $request->room);
    printf("%s<br />\n", $request->client);

    var_dump($request);
    die();
});