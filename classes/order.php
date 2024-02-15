<?php
    /**
     * Represents a food order for a Diner
     * @author Zalman I.
     * @copyright 2024
     */
    class Order
    {
        /**
         * @var string The ordered food item
         */
        private $_food;

        /**
         * @var string The order's meal type
         */
        private $_meal;

        /**
         * @var string The selected additional food items
         */
        private $_condiments;

        /**
         * Constructs a default order using the given data
         * @param string $food The selected food item
         * @param string $meal The selected meal type
         * @param string $condiments The selected additional food items
         */
        public function __construct($food = "N/A", $meal = "N/A", $condiments = "N/A")
        {
            $this->_food = $food;
            $this->_meal = $meal;
            $this->_condiments = $condiments;
        }


        /**
         * Gets and returns the ordered food item
         * @return string The ordered food item
         */
        public function getFood()
        {
            return $this->_food;
        }

        /**
         * Sets the current order's food to the given one
         * @param string $food The order's new food item
         */
        public function setFood($food)
        {
            $this->_food = $food;
        }

        /**
         * Gets and returns the order's meal type
         * @return string the order's meal type
         */
        public function getMeal()
        {
            return $this->_meal;
        }

        /**
         * Sets the current order's meal to the given one
         * @param string $meal The order's new meal type
         */
        public function setMeal($meal)
        {
            $this->_meal = $meal;
        }

        /**
         * Gets and returns any additional requested items
         * @return string any additional requested items
         */
        public function getCondiments()
        {
            return $this->_condiments;
        }

        /**
         * Sets the current order's condiments to the given ones
         * @param mixed $condiments the order's new condiments
         */
        public function setCondiments($condiments)
        {
            $this->_condiments = $condiments;
        }
    }
?>