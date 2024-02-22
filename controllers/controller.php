<?php
    /**
     * Main controller for Diner project
     */
    class Controller
    {
        private $_f3;

        function __construct($f3)
        {
            $this->_f3 = $f3;
        }

        function home()
        {
            // create a new view object
            $view = new Template();

            // display file at following path
            echo $view->render("views/home.html");
        }

        function breakfast()
        {
            // create a new view object
            $view = new Template();

            // display file at following path
            echo $view->render("views/breakfast-menu.html");
        }

        function order1()
        {
            // jf the order form has been posted
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // construct new Order to store given data
                $currOrder = new Order();

                // if the given food is valid
                if(Validate::foodIsValid($_POST["food"])) {
                    // add it to the order
                    $currOrder->setFood($_POST["food"]);
                }

                // otherwise set error to be displayed
                else {
                    $this->_f3->set("errors['food']", "The given food item was invalid");
                }

                // if the given meal is valid
                if(Validate::mealIsValid($_POST["meal"])) {
                    // add it to the order
                    $currOrder->setMeal($_POST["meal"]);
                }

                // otherwise set error to be displayed
                else {
                    $this->_f3->set("errors['meal']", "The given meal item was invalid");
                }

                // If there are no errors
                if (empty($this->_f3->get('errors'))) {
                    // add current order into session
                    $this->_f3->set('SESSION.order', $currOrder);

                    // redirect to the order-2 path
                    $this->_f3->reroute("order-2");
                }
            }

            // create a new view object
            $view = new Template();

            // display file at following path
            echo $view->render("views/order-form-1.html");
        }

        function order2()
        {
            // jf the order form has been posted
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // validate the given data
                if (isset($_POST['condiments'])){
                    $condiments = implode(", ", $_POST['condiments']);
                }
                else {
                    $condiments = "None selected";
                }

                // add given data to order
                $this->_f3->get('SESSION.order')->setCondiments($condiments);

                // redirect to the summary page
                $this->_f3->reroute('summary');
            }

            // Add data to the F3 "hive"
            $this->_f3->set('condiments', DataLayer::getCondiments());

            // Display a view page
            $view = new Template();
            echo $view->render('views/order-form-2.html');
        }

        function summary()
        {
            // create a new view object
            $view = new Template();

            // display file at following path
            echo $view->render("views/summary.html");
        }
    }