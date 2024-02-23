<?php
    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Require the autoload file
    require_once('vendor/autoload.php');
    require_once('model/data-layer.php');
    require_once('model/validate.php');

    // Testing Classes
//    $order = new Order("pizza", "lunch");
//    var_dump($order);

    // Instantiate the F3 (Fat-Free Framework) Base class
    $f3 = Base::instance(); // Static method would use "::"
    // In java you would write it like this, Base f3 = new Base();

    // Routes
    // =========================================================================================
    // Define a default route
    $f3 -> route('GET /', function($f3) {
        // Sets location for Nav Bar conditions
        $f3->set('location', 'home');

        $view = new Template();
        echo $view -> render('views/home.html');
    });

    // Define a menu route
    $f3 -> route('GET /menu', function($f3) {
        // Sets location for Nav Bar conditions
        $f3->set('location', 'menu');

        // Add data to the F3 "hive"
        $f3 -> set('menuBreakfasts', getMenuBreakfast());
        $f3 -> set('menuDrinks', getMenuDrinks());

        $view = new Template();
        echo $view -> render('views/menu.html');
    });

    // Define a order1 route
    $f3 -> route('GET|POST /order', function($f3) {
        // Sets location for Nav Bar conditions
        $f3->set('location', 'order');

        // If user submits the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submitBtn'])) {
                // Initialize variables
                $food = "";
                $meal = "";
                $conds = "";

                // Validate the data
                // Food
                if(validFood($_POST["orderName"])) {
                    $food = $_POST['orderName'];
                }
                else {
                    $f3 -> set ('errors["orderName"]', "That item is not on the menu");
                }

                // Meal
                if(isset($meal) and validMeal($_POST['orderMenu'])) {
                    $meal = $_POST['orderMenu'];
                }
                else {
                    $f3 -> set ('errors["orderMenu"]', "Please Choose a Menu");
                }

                // Conds
                if (isset($_POST['orderCon'])) {
                    $conds = implode(", ", $_POST['orderCon']);
                }
                else {
                    $conds = "None selected";
                }

                // If there are no errors
                if (empty($f3 -> get('errors'))) {
                    // New Order object
                    $order = new Order($food, $meal, $conds);

                    // Put the object in the session array
                    $f3 -> set('SESSION.order', $order);
                    // var_dump($f3->get('SESSION.order'));

                    // Redirect to summary route
                    $f3 -> reroute('summary');
                }
            }
        }

        // Add data to the F3 "hive"
        $f3 -> set('menus', getMenu());
        $f3 -> set('cons', getConds());

        $view = new Template();
        echo $view -> render('views/order1.html');
    });

    // Define a summary route
    $f3 -> route('GET /summary',function($f3) {
        // Sets location for Nav Bar conditions
        $f3->set('location', 'summary');

        $view = new Template();
        echo $view -> render('views/summary.html');
    });

    // Run fat-free
    // =========================================================================================
    $f3 -> run();