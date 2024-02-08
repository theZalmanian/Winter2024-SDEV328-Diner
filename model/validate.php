<?php
    function foodIsValid($food) {
        // if no food was given, or the food is not only made up of letters
        if(trim($food) == "" || !ctype_alpha($food)) {
            return false;
        }

        // otherwise, food is valid
        return true;
    }

    function mealIsValid($meal) {
        // setup list of valid meals
        $validMeals = array("breakfast", "lunch", "dinner");

        // if the given meal is stored as valid meal
        if(in_array($meal, $validMeals)) {
            return true;
        }

        // otherwise, meal is not valid
        return false;
    }
?>