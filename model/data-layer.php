<?php
class DataLayer {
    // Menus & Drinks
    // =========================================================================
    static function getMenuBreakfast() {
        return array(
            'Pancakes'=> array('$4.99', 'Mouthwatering pancakes, perfectly fluffy and golden-brown, a delightful breakfast treat that will tantalize your taste buds with every bite!'),
            'Waffles'=> array('$3.99', 'Savor the crispy perfection of our waffles, with their
                                golden-brown, grid-patterned surface and fluffy
                                interior, delivering a deliciously satisfying breakfast
                                experience that will leave you craving more!'),
            'Corned beef hash tables' => array('$5.99', "Delight in the savory bliss of our corned beef hash
                                tables, where tender chunks of corned beef mingle with
                                perfectly diced potatoes and flavorful spices, creating
                                a hearty and satisfying dish that's sure to become your
                                new breakfast favorite!")
        );
    }
    static function getMenuDrinks() {
        return array(
            'Water'=> array('Free', ''),
            'Coffee'=> array('$1.99', 'Elevate your mornings with our exquisite coffee,
                                expertly brewed to perfection from the finest beans,
                                delivering a rich and invigorating flavor experience
                                that will awaken your senses and set the perfect tone
                                for your day ahead'),
            'Tea' => array('$1.99', "Indulge in the soothing elegance of our tea selection,
                                curated from the finest leaves and infused with delicate
                                flavors to offer a calming and rejuvenating experience,
                                perfect for moments of relaxation or shared
                                conversations with loved ones.")
        );
    }

    // Order Form
    // =========================================================================
    static function getMenu() {
        return array('menu1'=>'Breakfast', 'menu2'=>'Lunch', 'menu3'=>'Dinner');
    }

    static function getConds() {
        return array('con1'=>'Ketchup','con2'=>'Mustard', 'con3'=>'Mayo', 'con4'=>'Sriracha', 'con5'=>'Relish');
    }

    // Job App
    // =========================================================================
    static function getExperience() {
        return array('experienceID1'=>'0-2', 'experienceID2'=>'2-4', 'experienceID3'=>'4+');
    }

    static function getSoftwareJobs() {
        return array('SJ1'=>'JavaScript', 'SJ2'=>'PHP', 'SJ3'=>'Java', 'SJ4'=>'Python', 'SJ5'=>'HTML', 'SJ6'=>'CSS', 'SJ7'=>'ReactJS', 'SJ8'=>'NodeJs');
    }

    static function getIndustryVerticals() {
        return array('IV1'=>'Health tech', 'IV2'=>'Ag tech', 'IV3'=>'HR tech', 'IV4'=>'Industrial tech', 'IV5'=>'Cybersecurity');
    }
}