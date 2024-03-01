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

    function internship() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'internship');

        $view = new Template();
        echo $view -> render('views/internship.html');
    }

    function internshipForm() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'internshipForm');

        // If the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Initialize variables
            $mailingLists = false;
            $firstName = "";
            $lastName = "";
            $email = "";
            $phone = "";
            $state = $_POST['state'];
            $textBox = $_POST['textBox'];
            $gitHubLink = '';
            $yearsExperience = '';
            $willingToRelocate = $_POST['willingToRelocate'];
            $softwareJobs = [];
            $industryVerticals = [];

            // Checks to see of the user wants to be in the mailing list
            if (isset($_POST["mailingLists"])) {
                $mailingLists = true;
            }

            // Validate the data
            // Checks if there is a first and last name
            if (Validate::validName($_POST['firstName']) and Validate::validName($_POST['lastName'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
            }
            else {
                $this->_f3 -> set ('errors["name"]', "Please fill both First and Last Name");
            }

            // Checks email
            if (Validate::validEmail($_POST['email'])) {
                $email = $_POST['email'];
            }
            else {
                $this->_f3 -> set ('errors["email"]', "Please enter valid email");
            }

            // Checks Phone
            if (Validate::validPhone($_POST['phone'])) {
                $phone = $_POST['phone'];
            }
            else {
                $this->_f3 -> set ('errors["phone"]', "Please enter valid phone number");
            }

            // Checks Experience
            if (Validate::validExperience($_POST['yearsExperience'])) {
                $yearsExperience = $_POST['yearsExperience'];
            }
            else {
                $this->_f3 -> set ('errors["experience"]', "Please choose your years of Experience");
            }

            // Checks Github
            if (Validate::validGithub($_POST['gitHubLink'])) {
                $gitHubLink = $_POST['gitHubLink'];
            }
            else {
                $this->_f3 -> set ('errors["gitHubLink"]', "Please enter a valid link");
            }

            // Implode the selected jobs and verticals if there is something there
            if (!empty($_POST['softwareJobs'])) {
                $softwareJobs = implode(", ", $_POST['softwareJobs']);
            }
            if (!empty($_POST['industryVerticals'])) {
                $industryVerticals = implode(", ", $_POST['industryVerticals']);
            }

            // If there are no errors
            if (empty($this->_f3 -> get('errors'))) {
                // If the user wants to be in the mailing list
                if ($mailingLists) {
                    $userApplication = new SubscribedToLists($firstName, $lastName, $email, $state, $phone, $gitHubLink, $yearsExperience, $willingToRelocate, $textBox, $softwareJobs, $industryVerticals);
                    $this->_f3 -> set('SESSION.userApplication', $userApplication);
                }
                else {
                    $userApplication = new Applicant($firstName, $lastName, $email, $state, $phone, $gitHubLink, $yearsExperience, $willingToRelocate, $textBox);
                    $this->_f3 -> set('SESSION.userApplication', $userApplication);
                }
                $this->_f3 -> set('SESSION.mailingLists', $mailingLists);

                /* The following got changed to class constructor WOOOOO :D
                // Put the data in the session array
                $this->_f3 -> set('SESSION.firstName', $firstName);
                $this->_f3 -> set('SESSION.lastName', $lastName);
                $this->_f3 -> set('SESSION.email', $email);
                $this->_f3 -> set('SESSION.state', $state);
                $this->_f3 -> set('SESSION.phone', $phone);
                $this->_f3 -> set('SESSION.textBox', $textBox);
                $this->_f3 -> set('SESSION.gitHubLink', $gitHubLink);
                $this->_f3 -> set('SESSION.yearsExperience', $yearsExperience);
                $this->_f3 -> set('SESSION.willingToRelocate', $willingToRelocate);
                $this->_f3 -> set('SESSION.softwareJobs', $softwareJobs);
                $this->_f3 -> set('SESSION.industryVerticals', $industryVerticals);
                */

                // Redirect to internshipFormSummary route
                $this->_f3 -> reroute('internshipFormSummary'); // This is using GET
            }
        }

        // Add data to the F3 "hive"
        $this->_f3 -> set('experiences', DataLayer::getExperience());
        $this->_f3 -> set('softwareJobs', DataLayer::getSoftwareJobs());
        $this->_f3 -> set('industryVerticals', DataLayer::getIndustryVerticals());

        $view = new Template();
        echo $view -> render('views/internshipForm.html');
    }

    // Define internshipFormSummary route
    function internshipFormSummary() {
        // Sets location for Nav Bar conditions
        $this->_f3->set('location', 'internshipFormSummary');

        $view = new Template();
        echo $view -> render('views/internshipFormSummary.html');
    }
}