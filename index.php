<?php
    // Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Require the autoload file
    require_once('vendor/autoload.php');

    // Testing Order Classes
//    $order = new Order("pizza", "lunch");
//    var_dump($order);

    // Testing DataLayer Class
//    var_dump(DataLayer::getMenu());
//    var_dump(DataLayer::getConds());

    // Testing DataLayer Class
//    echo Validate::validFood("Pancakes");

    // Instantiate the F3 (Fat-Free Framework) Base class
    // In java you would write it like this, Base f3 = new Base();
    $f3 = Base::instance(); // Static method will use "::"
    $con = new Controller($f3);

    // Routes
    // =========================================================================================
    // Define a default route
    $f3 -> route('GET /', function() {
        $GLOBALS['con']->home();
    });

    // Define a menu route
    $f3 -> route('GET /menu', function() {
        $GLOBALS['con']->menu();
    });

    // Define a order route
    $f3 -> route('GET|POST /order', function() {
        $GLOBALS['con']->order();
    });

    // Define a summary route
    $f3 -> route('GET /summary',function() {
        $GLOBALS['con']->summary();
    });

    // Define a internship route
    $f3 -> route('GET /internship',function() {
        $GLOBALS['con']->internship();
    });

    // Define a internship form route
    $f3 -> route('GET|POST /internshipForm',function() {
        $GLOBALS['con']->internshipForm();
    });

    // Define a internship form route
    $f3 -> route('GET|POST /internshipFormSummary',function() {
        $GLOBALS['con']->internshipFormSummary();
    });

    // Run fat-free
    // =========================================================================================
    $f3 -> run();