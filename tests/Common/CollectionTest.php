<?php

/**
 * Created by PhpStorm.
 * User: milos
 * Date: 29.2.16.
 * Time: 01.26
 */
class CollectionTest extends PHPUnit_Framework_TestCase
{

    private $item = "test_item";
    private $key = "test_key";

    private $items = array(
        "key1" => "item1",
        "key2" => "item2",
        "key3" => "item3"
    );

    /**
     * @return \Forge\Common\Collection
     */
    private function getWithSingleItem()
    {
        $collection = new  \Forge\Common\Collection();
        $collection->add($this->item, $this->key);

        return $collection;
    }

    /**
     * @return \Forge\Common\Collection
     */
    private function getWithMultiplyItems()
    {
        $collection = new \Forge\Common\Collection();
        $collection->addAll($this->items);
        return $collection;
    }

    /**
     * Tests the add method
     */
    public function  testAdd()
    {
        $collection = $this->getWithSingleItem();
        $this->assertEquals($this->item, $collection->get($this->key));
    }

    /**
     * Tests the add method with no key
     */
    public function testAddWithNoKey()
    {
        $collection = new \Forge\Common\Collection();
        $collection->add("test", null);
        $this->assertEquals("test", $collection->get(0));
    }


    /**
     *Tests the addAll method
     */
    public function testAddAll()
    {
        $collection = $this->getWithMultiplyItems();

        foreach ($this->items as $key => $value) {
            $this->assertEquals($this->items[$key], $collection->get($key));
        }

    }

    /**
     * Tests the remove method
     */
    public function testRemove()
    {
        $collection = $this->getWithSingleItem();

        $this->assertEquals($this->item, $collection->get($this->key));

        $collection->remove($this->key);

        $this->assertEquals(false, $collection->get($this->key));
    }

    /**
     * Tests the get method
     */
    public function testGet()
    {
        $collection = $this->getWithSingleItem();

        $this->assertEquals($this->item, $collection->get($this->key));
    }

    /**
     * Tets the keys method
     */
    public function testKeys()
    {
        $collection = $this->getWithMultiplyItems();

        foreach ($this->items as $key => $value) {
            $this->assertEquals(true, in_array($key, $collection->keys()));
        }
    }

    /**
     *Tests the length method
     */
    public function testLength()
    {
        $collection = $this->getWithMultiplyItems();

        $this->assertEquals(count($this->items), $collection->length());
    }

    /**
     * Tests the exists method
     */
    public function testExists()
    {
        $collection = $this->getWithSingleItem();

        $this->assertEquals(true, $collection->exists($this->key));
    }

    /**
     * Tests the toArray method
     */
    public function testToArray()
    {
        $collection = $this->getWithMultiplyItems();

        $this->assertEquals(true, is_array($collection->toArray()));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidArgumentExceptionException()
    {
        $collection = new \Forge\Common\Collection();
        $collection->add(null);

    }


}