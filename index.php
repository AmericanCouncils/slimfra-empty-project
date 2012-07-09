<?php

//this is the autoload file created by 'composer' when you install dependencies,
//it ensures that code for any dependency libraries is loaded automatically when it's
//called the first time
include 'vendor/autoload.php';

//If you have a lot of configuration, you can instantiate the app
//with a path to your root config file
//$app = new Slimfra\Application('config/config.php');

//or instantiate app directly with an array of configuration
$app = new Slimfra\Application(array(
    'app_name' => "Example Project",
    'footer' => "Copyright [your_name] 2012 &copy;",
    'menu' => array(),
    'debug' => true,
));

//If you have custom container service providers, you should instantiate those here
//For more on container services and providers see WELCOME.md, or read the Silex documentation
//on dependency injection

//$app->regiser(new CustomProvider());

//define project routes and connect it to code in src/
//when a request comes in that matches the declared patterns
//it will call the code specified
$app->get("/", "HelloWorld::renderHtml");
$app->get("/hello/{name}", "HelloWorld::renderHtml");
$app->get("/hello.txt/{name}", "HelloWorld::renderText");
$app->get("/hello.json/{name}", "HelloWorld::renderJson");
$app->get("/hello.xml/{name}", "HelloWorld::customXmlResponse");

//Run the application: this stage will create a request object
//call the code that matches the requested route, and return
//a response object to the browser.
$app->run();

//You can optionally run the app with a built-in HTTP reverse proxy cache, 
//if you have responses that are public and can be cached, this will ensure
//that your app only bootstraps and executes the code for requests that require
//it to do so, all others will be cached and returned early
//$app['http_cache']->run();
