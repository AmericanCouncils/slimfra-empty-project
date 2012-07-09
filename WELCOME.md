# Welcome #

Welcome to your new Slimfra project.  Everything you need to know about the project, in terms of routes, handling code, and custom services should be immediately apparent from scanning `index.php`.

Slimfra comes with a few example routes defined in `index.php`, one example controller and an example Twig template, to demonstrate how it works.  Once it makes sense, you can safely delete the included controller and templates, and start building a custom project.

## Project structure ##

* `index.php` - This is the entry point for the application.  In this file is where you instantiate your app with configuration, register any custom service providers, and connect routes to your code located in `src/`.
* `composer.json` - This is where you declare what libraries your project requires.
* `README.md` - This is a file for documenting your project so that others can understand it
* `.htaccess` - This is default configuration for the Apache web server, it allows you to remove `index.php` from the urls in your project.
* `app/` - This directory is for data that holds the state of an application.  The app must be able to write to this directory and all its subdirectories.
    * `cache/` - Cache items stored in the file system are stored here.  You should be always be able to safely delete everything in this directory.
    * `data/` - Data that is not temporary is stored here.  By default a `sqlite` database is stored in `db.sqlite`, if you use the `db` service.
    * `config/` - Your apps configuration lives here, if you choose to store configuration in files, rather than passing it directly.
* `assets/` - This directory is for all presentation assets that must be web accessible.  You can organize this directory however you want, but we include some subdirectories by default to encourage keeping your files organized.
    * `js/` - a place for storing javascript files
    * `css/` - a place for storing css stylesheets
    * `images/` - a place for storing images that are referenced from css stylesheets
* `src/` - Your PHP code goes here.  All code in this directory should be organized according to the [`PSR-0`](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) standard - if it is, it will autoload as its called.  If you have libraries of plain functions you want to load, you will have to `include()` them manually in your code.  Write code people will recognize without much struggle, following the [`PSR-2`](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) coding standards is highly recommended.
* `templates/` - This is a directory for Twig templates.  Twig is the only templating system included, because they're cleaner, and strictly limit what kinds of logic you can do in a template file, ensuring that yoru logic stays in your PHP classes, where it belongs.
* `uploads/` - A default directory for file uploads.

## Getting started ##

The `index.php` file contains comments that describe what each line means.  You can delete the comments and provided code + controllers to start work on your own project.

## Managing configuration ##

The Slimfra app can be built with your custom configuration in two ways - either by passing an array of configuration in the constructor, or when that becomes too unwieldy, by passing a path to a config file.

    <?php
    //directly with configuration
    $app = new Slimfra\Application(array(
        'app.name' => "Example Project",
        'app.footer' => "Some footer text",
        'debug' => true
    ));
    
    //or, if you have a lot of configuration and want to manage it
    //in separate files, just pass a link to the root config file
    
    $app = new Slimfra\Application('config/config.php');

## Routes and Controllers ##

Slimfra makes it easy to connect application routes to code.  You can see a few examples below, but it's worth reading the [Silex documentation](http://silex.sensiolabs.org/doc/usage.html#routing) as well.  The biggest difference between Slimfra and Silex in this regard, is that by default Controllers are specified as a string, instead of a Closure - but you can define your controllers that way as well if you like.

    //will allow a request of any type to go through
    $app->any("/", "ControllerName::methodName");

    //will only match GET requests to the declared route
    $app->get("/foo", "ControllerName::methodName");

    //will only match POST requests to the same route
    $app->post("/foo", "ControllerName::differentMethodName");

    //will only match GET, PUT and DELETE requests
    $app->match("/foo", "ControllerName::anotherMethodName")->method("GET|PUT|DELETE");
    
If your controller classes extend `Slimfra\Controller`, they will automatically have the application injected into them.  The base controller also implements `ArrayAccess`, which provides a nice shortcut for referencing services and configuration.  See the example below:

    <?php
    class FooController extends Slimfra\Controller {
        public function execute() {
            
            //the base controller allows you to reference the app via `$this->app`
            $service = $this->app['some_service'];

            //or via the shortcut
            $service = $this['some_service'];
            
            //throw an http exception
            $this->app->abort(404, "Content not found.");
        }
    }

## Services and Dependency Injection ##

Dependency injection allows you to use objects which may require complicated setup much easier, and sharable throughout the application in a way that doesn't force you to rely on global variables or singletons.  This lets you write code that is easy to test, and far more reusable than it would be otherwise.  For more on dependency injection, check out the [Silex documentation](http://silex.sensiolabs.org/doc/services.html) on the subject.

Container services are registered via Providers.  If you have custom providers to register, you must register them before you execute the application via `$app->run()`.  For more on registering providers, check out the [Silex documentation](http://silex.sensiolabs.org/doc/providers.html).