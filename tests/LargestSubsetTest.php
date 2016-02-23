<?php
use MidoriKocak\UpWork\LargestSubset;

class LargestSubsetTest extends \PHPUnit_Framework_TestCase
{
    public $domain;

    public function setup()
    {
        $this->domain = array('b', 'r', 'o', 'w', 'n', 'f', 'o', 'x', 'h', 'u', 'n', 't', 'e', 'r', 'n', 'f', 'o', 'x', 'r', 'y', 'h', 'u', 'n');
    }

    public function testSolve()
    {
        $result = LargestSubset::solve($this->domain);
        $this->assertTrue(array('n','f','o','x') == $result);
    }
}