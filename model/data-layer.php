<?php
    /**
     * Contains data related to project
     */
    class DataLayer
    {
        /**
         * Gets and returns an array containing all available meals
         * @return string[] an array containing all available meals
         */
        static function getMeals()
        {
            return array('breakfast', 'brunch', 'lunch', 'dinner');
        }

        /**
         * Gets and returns an array containing all available condiments
         * @return string[] an array containing all available condiments
         */
        static function getCondiments() {
            return array('ketchup', 'mustard', 'mayo', 'sriracha', 'relish');
        }
    }
?>