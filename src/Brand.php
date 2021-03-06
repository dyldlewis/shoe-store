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
            $this->id = $id;
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
                $this->id = $GLOBALS['DB']->lastInsertId();
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

        static function find($search_id)
        {
            $returned_brands = $GLOBALS['DB']->prepare("SELECT * FROM brands WHERE id = :id;");
            $returned_brands->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_brands->execute();
            foreach($returned_brands as $brand) {
                $name = $brand['name'];
                $price = $brand['price'];
                $id = $brand['id'];
                if ($id == $search_id) {
                    $found_brand = new Brand($name, $price, $id);
                }
            }
        return $found_brand;
        }

        function update($new_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE brands SET name = '{$new_name}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setName($new_name);
                return true;
            } else {
                return false;
            }
        }

        function getStores()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands JOIN stores_brands ON (stores_brands.brand_id = brands.id) JOIN stores ON (stores.id = stores_brands.store_id) WHERE brands.id = {$this->getId()};");
            $stores = array();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $id = $store['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        function addStore($store)
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores_brands (brand_id, store_id) VALUES ({$this->getId()}, {$store->getId()});");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

    }






 ?>
