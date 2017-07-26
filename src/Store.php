<?php
    class Store
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
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

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->getName()}');");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $id = $store['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
        return $stores;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stores;");
        }

        static function find($search_id)
        {
            $returned_stores = $GLOBALS['DB']->prepare("SELECT * FROM stores WHERE id = :id;");
            $returned_stores->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_stores->execute();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $id = $store['id'];
                if ($id == $search_id) {
                    $found_store = new Store($name, $id);
                }
            }
        return $found_store;
        }

        function update($new_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setName($new_name);
                return true;
            } else {
                return false;
            }
        }

        function getBrands()
        {
            $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores JOIN stores_brands ON (stores_brands.store_id = stores.id) JOIN brands ON (brands.id = stores_brands.brand_id) WHERE stores.id = {$this->getId()};");
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

        function addBrand($brand)
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$brand->getId()});");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

    }
?>
