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
        function testSave()
        {
            $name = "thingy";
            $price = 50;
            $test_brand = new Brand($name, $price);

            $executed = $test_brand->save();

            $this->assertTrue($executed, "Brand was not successfully saved to the database");
        }

    }



 ?>
