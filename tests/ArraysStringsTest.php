<?php
use MidoriKocak\ConceptsAlgorithms\ArraysStrings;

class ArraysStringsTest extends PHPUnit_Framework_TestCase
{

    public $object;
    public $unique;
    public $reverse;
    public $permutation;
    public $spaces;
    public $compress;

    /**
     *
     */
    public function setup()
    {
        $this->object = new ArraysStrings();
        $this->unique = [""=>false, "a"=>true, "matador"=>false, "beast"=>true, "BEATS"=>true];
        $this->compress = "aabcccccaaa";
    }

    /**
     * 1.1 implement an algorithm to determine if a string has all unique characters.
     * What if you cannot use additional data structures?
     */
    public function testUniqueChars()
    {
        $result = false;
        foreach($this->unique as $key => $value){
            $result = $this->object->isUniqueChars($key) == $value;
        }
        $this->assertTrue($result);
    }

    /**
     * 1.1 implement an algorithm to determine if a string has all unique characters.
     * What if you cannot use additional data structures?
     */
    public function testUniqueChars2()
    {
        $result = false;
        foreach($this->unique as $key => $value){
            $result = $this->object->isUniqueChars2($key) == $value;
        }
        $this->assertTrue($result);
    }



    /**
     *
     */
    public function testReverse()
    {
    }

    /**
     *
     */
    public function testCheckPermutation()
    {
    }

    /**
     *
     */
    public function testReplaceSpaces()
    {
    }

    /**
     *
     */
    public function testCompressString()
    {
    }

    /**
     *
     */
    public function testRotateMatrix()
    {
    }

    /**
     *
     */
    public function testZeroMatrix()
    {
    }

    /**
     *
     */
    public function testCheckRotation()
    {
    }
}
