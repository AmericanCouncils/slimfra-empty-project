<?php

//include the application with configuration and services defined in bootstrap.php
$app = require 'bootstrap.php';

//define web routes and connect it to code in src/
//when a request comes in that matches the declared patterns
//it will call the code specified
$app->get("/", "Controller\HelloWorld::renderHtml");
$app->get("/hello/{name}", "Controller\HelloWorld::renderHtml");
$app->get("/hello.txt/{name}", "Controller\HelloWorld::renderText");
$app->get("/hello.json/{name}", "Controller\HelloWorld::renderJson");
$app->get("/hello.xml/{name}", "Controller\HelloWorld::customXmlResponse");

//Run the application: this stage will create a request object
//call the code that matches the requested route, and return
//a response object to the client.
$app->run();

//You can optionally run the app with a built-in HTTP reverse proxy cache, 
//if you have responses that are public and can be cached, this will ensure
//that your app only bootstraps and executes the code for requests that require
//it to do so, all others will be cached and returned early
//$app['http_cache']->run();
