<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        function testSave()
        {
            $name = "Roger";

            $test_store = new Store($name);

            $executed = $test_store->save();
            $this->assertTrue($executed, "Course not successfully saved");

        }
    }
?>
