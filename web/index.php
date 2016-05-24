<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {
    // Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(array(
        '../src/controllers/',
        '../src/models/'
    ))->register();

    // Create a DI
    $di = new FactoryDefault();

    // Setup the database service
    $di->set('db', function () {
        return new DbAdapter(array(
            "host"     => "stg-prg-displayengagement.cjrhi0xnjjly.us-west-1.rds.amazonaws.com",
            "username" => "scottrallya",
            "password" => "SR_12345",
            "dbname"   => "displayengagement"
        ));
    });

    // Setup the view component
    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../src/views/');
        return $view;
    });

    // Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    });

    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
     echo "Exception: ", $e->getMessage();
}
