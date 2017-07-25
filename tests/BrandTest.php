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

    }



 ?>
