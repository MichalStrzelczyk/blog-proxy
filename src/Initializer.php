<?php
declare (strict_types=1);

class Initializer {

    /**
     * @param \Phalcon\DiInterface $di
     */
    static public function initializeServices(\Phalcon\DiInterface $di): void {
        $di->setShared('router',
            function () use ($di) {
                $router = new \Phalcon\Mvc\Router(false);
                $router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI);
                $router->setDefaultNamespace('Controller');
                $router->notFound([
                    'namespace' => 'Controller',
                    'controller' => 'error',
                    'action' => 'notFound',
                ]);

                $pathToRoutes = SRC_PATH . DIRECTORY_SEPARATOR . 'Route' . DIRECTORY_SEPARATOR . '*.php';
                foreach (\glob($pathToRoutes) as $filename) {
                    \is_readable($filename) and require_once $filename;
                }

                return $router;
            });

        $di->setShared(
            'config',
            function () {
                $pathToConfigFile = CONFIG_PATH . DIRECTORY_SEPARATOR . $_SERVER['APPLICATION_ENVIRONMENT'] . DIRECTORY_SEPARATOR . 'config.ini';
                if (!\file_exists($pathToConfigFile)) {
                    throw new \RuntimeException('Config file not exists');
                }

                $config = \Phalcon\Config\Factory::load(
                    [
                        'filePath' => $pathToConfigFile,
                        'adapter' => 'ini',
                    ]
                );

                return $config;
            }
        );

        $di->setShared(
            'url',
            function () {
                $url = new \Phalcon\Mvc\Url();
                $url->setBaseUri('/');

                return $url;
            }
        );

        $di->setShared(
            'request',
            function () {
                $request = new \Phalcon\Http\Request();

                return $request;
            }
        );

        $di->setShared(
            'dispatcher',
            function () {
                $dispatcher = new \Phalcon\Mvc\Dispatcher();

                return $dispatcher;
            }
        );

        $di->setShared(
            'response',
            function () {
                $response = new \Phalcon\Http\Response();

                return $response;
            }
        );

        $di->setShared(
            'voltService',
            function ($view, $di) {
                $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
                $volt->setOptions(
                    [
                        'compiledPath' => BASE_PATH . '/cache/',
                        'compiledExtension' => '.cached',
                        'compiledSeparator' => '_',
                        'prefix' => 'view'
                    ]
                );

                return $volt;
            }
        );

        // Register Volt as template engine
        $di->setShared(
            'view',
            function () {
                $view = new \Phalcon\Mvc\View();
                $view->setViewsDir(BASE_PATH . '/templates/');
                $view->registerEngines(
                    [
                        '.volt' => 'voltService',
                    ]
                );

                return $view;
            }
        );
    }
}