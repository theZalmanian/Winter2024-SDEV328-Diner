<?php
    /**
     * Contains validation functions for project
     */
    class Validate {
        /**
         * Checks if the given food item is valid, and returns true/false correspondingly
         * @param string $food The food item being checked
         * @return bool True if given food item is valid; otherwise false
         */
        static function foodIsValid($food) {
            // if no food was given, or the food is not only made up of letters
            if(trim($food) == "" || !ctype_alpha($food)) {
                return false;
            }

            // otherwise, food is valid
            return true;
        }

        /**
         *  Checks if the given meal is valid, and returns true/false correspondingly
         * @param string $meal The meal being checked
         * @return bool True if given meal is valid; otherwise false
         */
        static function mealIsValid($meal) {
            // check if the given meal is stored as valid meal
            return in_array($meal, DataLayer::getMeals());
        }
    }
?>