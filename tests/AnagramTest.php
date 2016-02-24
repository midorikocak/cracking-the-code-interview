<?php
use MidoriKocak\Yelp\Anagrams;

class AnagramTest extends PHPUnit_Framework_TestCase
{

    public $anagrams;
    public $data;

    public function setup()
    {
        $this->anagrams = new Anagrams();
        $this->data = ["abets", "baste", "bet as", "beast", "BEATS"];
    }

    public function testEmptyArray()
    {
        $this->assertFalse($this->anagrams->checkArray([]));
    }

    public function testWrongArray()
    {
        $wrongArray = array_push($this->data,"kamil");
        $this->assertFalse($this->anagrams->checkArray($wrongArray));
    }

    public function testTrueArray()
    {
        $this->assertTrue($this->anagrams->checkArray($this->data));
    }

    public function testEmptyElement()
    {
        $wrongArray = array_push($this->data,"");
        $this->assertFalse($this->anagrams->checkArray($wrongArray));
    }
}
