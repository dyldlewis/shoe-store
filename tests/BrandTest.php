<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
        }

        function testGetPrice()
        {
            $name = "terry";
            $price = 500;
            $test_brand = new Brand($name, $price);
            $result = $test_brand->getPrice();

            $this->assertEquals($price, $result);
        }

        function testGetName()
        {
            $name = "billy";
            $price = 20;
            $test_brand = new Brand($name, $price);
            $result = $test_brand->getName();

            $this->assertEquals($name, $result);
        }
        function testSave()
        {
            $name = "thingy";
            $price = 50;
            $test_brand = new Brand($name, $price);

            $executed = $test_brand->save();

            $this->assertTrue($executed, "Brand was not successfully saved to the database");
        }

        function testGetAll()
        {
            $name = "Big shoe";
            $price = 200;
            $test_brand = new Brand($name, $price);
            $test_brand->save();

            $name1 = "Ballin";
            $price1 = 150;
            $test_brand1 = new Brand($name1, $price1);
            $test_brand1->save();

            $result = Brand::getAll();

            $this->assertEquals([$test_brand, $test_brand1], $result);
        }

        function testdeleteAll()
        {
            $name = "Big damn shoe";
            $price = 2003;
            $test_brand = new Brand($name, $price);
            $test_brand->save();

            $name1 = "Ballin boiii";
            $price1 = 1503;
            $test_brand1 = new Brand($name1, $price1);
            $test_brand1->save();

            Brand::deleteAll();
            $result = Brand::getAll();

            $this->assertEquals([], $result);
        }




        function testFind()
        {
            $name = "Margery";
            $price = 500;
            $test_brand = new Brand($name, $price);
            $test_brand->save();
            $brand_id = $test_brand->getId();

            $name2 = "Stacy";
            $price2 = 2323;
            $test_brand2 = new Brand($name2, $price2);
            $test_brand2->save();

            $result = Brand::find($brand_id);
            $this->assertEquals($test_brand, $result);
        }


        function testUpdate()
        {
            $name = "Kevin";
            $price = 200;
            $test_brand = new Brand($name, $price);
            $test_brand->save();

            $new_name = "Richard";
            $test_brand->update($new_name);

            $this->assertEquals($new_name, $test_brand->getName());
        }

        function testGetStores()
        {
            $name = "Moddetown";
            $test_store = new Store($name);
            $test_store->save();

            $store_name = "Johnsons";
            $test_store2 = new Store($store_name);
            $test_store2->save();

            $name2 = "Canteelo";
            $price = 2332;
            $test_brand = new Brand($name2, $price);
            $test_brand->save();

            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            $result = $test_brand->getStores();
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testAddStore()
        {
            $name = "Shleepta";
            $test_store = new Store($name);
            $test_store->save();

            $name = "Portown";
            $price = 2020;
            $test_brand = new Brand($name, $price);
            $test_brand->save();

            $test_brand->addStore($test_store);
            $this->assertEquals($test_brand->getStores(), [$test_store]);
        }
    }



 ?>
