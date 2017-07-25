<?php
    class Brand
    {
        private $name;
        private $price;
        private $id;

        function __construct($name, $price, $id = null)
        {
            $this->name = $name;
            $this->price = $price;
            $this->id - $id;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO brands (name, price) VALUES ('{$this->getName()}', {$this->getPrice()});");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
            $brands = array();
            foreach($returned_brands as $brand) {
                $name = $brand['name'];
                $price = $brand['price'];
                $id = $brand['id'];
                $new_brand = new Brand($name, $price, $id);
                array_push($brands, $new_brand);
            }
        return $brands;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM brands;");
        }


    }






 ?>
