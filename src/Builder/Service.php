<?php
declare (strict_types=1);

namespace Builder;

/** @var \Phalcon\Di $di */

$di->setShared(
    'Service\ApiClient',
    function () use ($di) {
        $httpClient = new \Maleficarum\Client\Http\Rest\BasicClient($di->get('config')->api_url);
        $service = new \Service\ApiClient($httpClient);

        return $service;
    }
);