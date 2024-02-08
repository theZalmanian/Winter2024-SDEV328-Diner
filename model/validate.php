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
        // check if the given meal is stored as valid meal
        return in_array($meal, getMeals());
    }
?>