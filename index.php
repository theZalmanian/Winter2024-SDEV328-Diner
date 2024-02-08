<?php
    /**
     * Zalman Izak
     * 01/16/24
     * Controller for the Diner application:
     * https://thezalmanian.greenriverdev.com/328/Winter2024-SDEV328-Diner/
     */

    // require Fat-Free Framework autoload file
    require_once("vendor/autoload.php");

    // access data model
    require_once ("model/data-layer.php");

    // access validation methods
    require_once ("model/validate.php");

    // instantiate Fat-Free Framework (f3) class
    $f3 = Base::instance();

    // define a default route for the project
    $f3->route("GET /", function() {
        // create a new view object
        $view = new Template();

        // display file at following path
        echo $view->render("views/home.html");
    });

    // define a breakfast route for the project
    $f3->route("GET /breakfast", function() {
        // create a new view object
        $view = new Template();

        // display file at following path
        echo $view->render("views/breakfast-menu.html");
    });

    // define an initial order route for the project
    $f3->route("GET|POST /order-1", function($f3) {
        // jf the order form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // if the given food is valid
            if(foodIsValid($_POST["food"])) {
                // store it within session
                $f3->set("SESSION.food", $_POST["food"]);
            }

            // otherwise set error to be displayed
            else {
                $f3->set("errors['food']", "The given food item was invalid");
            }

            // if the given meal is valid
            if(mealIsValid($_POST["meal"])) {
                // store given meal data within SESSION
                $f3->set("SESSION.meal", $_POST["meal"]);
            }

            // otherwise set error to be displayed
            else {
                $f3->set("errors['meal']", "The given meal item was invalid");
            }

            // If there are no errors
            if (empty($f3->get('errors'))) {
                // redirect to the order-2 path
                $f3->reroute("order-2");
            }
        }

        // create a new view object
        $view = new Template();

        // display file at following path
        echo $view->render("views/order-form-1.html");
    });

    // define a second order route
    $f3->route('GET|POST /order-2', function($f3) {
        // jf the order form has been posted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate the given data
            if (isset($_POST['condiments'])){
                $condiments = implode(", ", $_POST['condiments']);
            }
            else {
                $condiments = "None selected";
            }

            // store given data within SESSION
            $f3->set('SESSION.condiments', $condiments);

            // redirect to the summary page
            $f3->reroute('summary');
        }

        // Add data to the F3 "hive"
        $f3->set('condiments', getCondiments());

        // Display a view page
        $view = new Template();
        echo $view->render('views/order-form-2.html');
    });

    // define a breakfast route for the project
    $f3->route("GET /summary", function() {
        // create a new view object
        $view = new Template();

        // display file at following path
        echo $view->render("views/summary.html");
    });

    // run Fat-Free Framework
    $f3->run()
?>