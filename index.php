<?php
    /**
     * Zalman Izak
     * 01/16/24
     * Controller for the Diner application:
     * https://thezalmanian.greenriverdev.com/328/Winter2024-SDEV328-Diner/
     */

    // require Fat-Free Framework autoload file
    require_once("vendor/autoload.php");

    // instantiate Fat-Free Framework (f3) class
    $f3 = Base::instance();

    // define a default route for the project
    $f3->route("GET /", function() {
        // create a new view object
        $view = new Template();

        // display file at following path
        echo $view->render("views/home.html");
    });

    // run Fat-Free Framework
    $f3->run()
?>