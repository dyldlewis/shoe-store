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
        protected function tearDown()
        {
            Store::deleteAll();
        }
        function testGetName()
        {
            $name = "karen";
            $test_store = new Store($name);
            $result = $test_store->getName();

            $this->assertEquals($name, $result);
        }

        function testSave()
        {
            $name = "Roger";

            $test_store = new Store($name);

            $executed = $test_store->save();
            $this->assertTrue($executed, "Course not successfully saved");

        }

        function testGetAll()
           {
               $name = "Psych";
               $test_store = new Store($name);
               $test_store->save();

               $name2 = "Math";
               $test_store2 = new Store($name2);
               $test_store2->save();

               $result = Store::getAll();
               $this->assertEquals([$test_store, $test_store2], $result);
           }

           function testDeleteAll()
           {
               $name = "Roger";
               $test_store = new Store($name);
               $test_store->save();

               $name2 = "Jerry";
               $test_store2 = new Store($name2);
               $test_store2->save();

               Store::deleteAll();

               $result = Store::getAll();
               $this->assertEquals([], $result);
           }

           function testFind()
           {
               $name = "Margery";
               $test_store = new Store($name);
               $test_store->save();
               $store_id = $test_store->getId();

               $name2 = "Stacy";
               $test_store2 = new Store($name2);
               $test_store2->save();

               $result = Store::find($store_id);
               $this->assertEquals($test_store, $result);
           }

           function testUpdate()
            {
                $name = "Economics";
                $test_store = new Store($name);
                $test_store->save();

                $new_name = "Psychology";
                $test_store->update($new_name);
                $result = $test_store->getName();
                $this->assertEquals($new_name, $result);
            }

    }
?>
