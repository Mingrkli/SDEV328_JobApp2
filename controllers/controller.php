<?php

class Controller {
    private $_f3; // Fat-free router

    function __construct($f3) {
        $this->_f3 = $f3;
    }

    function home() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'home');

        $view = new Template();
        echo $view -> render('views/home.html');
    }

    function menu() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'menu');

        // Add data to the F3 "hive"
        $this->_f3 -> set('menuBreakfasts', DataLayer::getMenuBreakfast());
        $this->_f3 -> set('menuDrinks', DataLayer::getMenuDrinks());

        $view = new Template();
        echo $view -> render('views/menu.html');
    }

    function order() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'order');

        // If user submits the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submitBtn'])) {
                // Initialize variables
                $food = "";
                $meal = "";
                $conds = "";

                // Validate the data
                // Food
                if(Validate::validFood($_POST["orderName"])) {
                    $food = $_POST['orderName'];
                }
                else {
                    $this->_f3 -> set ('errors["orderName"]', "That item is not on the menu");
                }

                // Meal
                if(isset($meal) and Validate::validMeal($_POST['orderMenu'])) {
                    $meal = $_POST['orderMenu'];
                }
                else {
                    $this->_f3 -> set ('errors["orderMenu"]', "Please Choose a Menu");
                }

                // Conds
                if (isset($_POST['orderCon'])) {
                    $conds = implode(", ", $_POST['orderCon']);
                }
                else {
                    $conds = "None selected";
                }

                // If there are no errors
                if (empty($this->_f3 -> get('errors'))) {
                    // New Order object
                    $order = new Order($food, $meal, $conds);

                    // Put the object in the session array
                    $this->_f3 -> set('SESSION.order', $order);
                    // var_dump($this->_f3->get('SESSION.order'));

                    // Redirect to summary route
                    $this->_f3 -> reroute('summary');
                }
            }
        }

        // Add data to the F3 "hive"
        $this->_f3 -> set('menus', DataLayer::getMenu());
        $this->_f3 -> set('cons', DataLayer::getConds());

        $view = new Template();
        echo $view -> render('views/order1.html');
    }

    function summary() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'summary');

        $view = new Template();
        echo $view -> render('views/summary.html');
    }
}