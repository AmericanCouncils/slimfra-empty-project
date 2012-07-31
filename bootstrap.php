<?php

//this is the autoload file created by 'composer' when you install dependencies,
//it ensures that code for any dependency libraries is loaded automatically when it's
//called the first time
include 'vendor/autoload.php';

//If you have a lot of configuration, you can instantiate the app
//with a path to your root config file
//$app = new Slimfra\Application('config/config.php');

//or instantiate app directly with an array of configuration
$app = new \Slimfra\Application(array(
    'debug' => true,
    'app.name' => "Example Project",
    'app.version' => '1.x-dev',
    'footer' => "Copyright [your_name] 2012 &copy;",
    'menu' => array(),
));

//If you have custom container service providers, you should instantiate those here
//For more on container services and providers see WELCOME.md, or read the Silex documentation
//on dependency injection

//$app->regiser(new Service\CustomProvider());

//return the application for use on the web, or via command line
return $app;
