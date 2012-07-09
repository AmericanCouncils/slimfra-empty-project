<?php

/**
 * An example controller.  See `index.php` for the routes mapped to these methods.
 *
 * @package Slimfra
 * @author Evan Villemez
 */
class HelloWorld extends \Slimfra\Controller {

    /**
     * Returning a string will automatically create a text response with 200 OK headers.
     */
    public function renderText() {
        return "Hello world!";
    }

    /**
     * Returning a rendered template will automatically create a 200 OK html response.
     */
    public function renderHtml($name = "World") {
        return $this['twig']->render('hello.html.twig', array(
            'name' => $name,
            'title' => "Welcome!",
            'app_name' => $this['app_name'],
        ));
    }
    
    /**
     * Return a JSON object response.  Will automatically create a 200 OK application/json response.
     */
    public function renderJson($name = "World") {
        return $this->app->json(array('name' => $name));
    }
    
    /**
     * You can always build the response object yourself, to have complete control!
     */
    public function customXmlResponse($name) {
        $response = new \Symfony\Component\HttpFoundation\Response("<root><name>$name</name></root>", 203);
        $response->setPublic();
        $response->setMaxAge(100);
        $response->headers->set('content-type', 'application/xml');
        
        return $response;
    }
}