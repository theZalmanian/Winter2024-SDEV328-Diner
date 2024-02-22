<?php
    /**
     * Zalman Izak
     * 01/16/24
     * Controller for the Diner application:
     * https://thezalmanian.greenriverdev.com/328/Winter2024-SDEV328-Diner/
     */

    // display errors (when needed)
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // require Fat-Free Framework autoload file
    require_once("vendor/autoload.php");

    // instantiate Fat-Free Framework (f3) class and set up controller
    $f3 = Base::instance();
    $controller = new Controller($f3);

    // define a default route for the project
    $f3->route("GET /", function() {
        global $controller;

        // call the home route
        $controller->home();
    });

    // define a breakfast route for the project
    $f3->route("GET /breakfast", function() {
        global $controller;

        // call the home route
        $controller->breakfast();
    });

    // define an initial order route for the project
    $f3->route("GET|POST /order-1", function() {
        global $controller;

        $controller->order1();
    });

    // define a second order route
    $f3->route('GET|POST /order-2', function() {
        global $controller;

        $controller->order2();
    });

    // define a breakfast route for the project
    $f3->route("GET /summary", function() {
        global $controller;

        $controller->summary();
    });

    // run Fat-Free Framework
    $f3->run();
?>