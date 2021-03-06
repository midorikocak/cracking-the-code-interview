<?php
use MidoriKocak\ConceptsAlgorithms\ArraysStrings;

class ArraysStringsTest extends \PHPUnit_Framework_TestCase
{

    public $object;
    public $unique;
    public $reverse;
    public $permutation1;
    public $permutation2;
    public $spaces;
    public $replaced;
    public $compress;

    public $rotateMatrix;
    public $rotatedMatrix
    ;
    /**
     *
     */
    public function setup()
    {
        $this->object = new ArraysStrings();
        $this->unique = ["" => false, "a" => true, "matador" => false, "beast" => true, "BEATS" => true];
        $this->trueReverse = ["" => "", "matador" => "rodatam", "beast" => "tsaeb"];
        $this->wrongReverse = ["" => "a", "mata dor" => "rodatam", "beact" => "tsaeb"];
        $this->compress = ["aabcccccaaa","a2b1c5a3"];

        $this->permutation1 = ["WHO", "WOH", "HWO", "HOW", "OHW", "OWH"];
        $this->permutation2 =
            ["STOP", "STPO", "SOTP", "SOTP", "SPTO", "SPOT",
            "TSOP", "TSPO", "TOSP", "TOPS", "TPSO", "TPOS",
            "OSTP", "OSPT", "OTSP", "OTPS", "OPST", "OPTS",
            "PSTO", "PSOT", "PTSO", "PTOS", "POST", "POTS"];

        $this->spaces = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        $this->replaced = "Lorem%20ipsum%20dolor%20sit%20amet,%20consectetur%20adipiscing%20elit,%20sed%20do%20eiusmod%20tempor%20incididunt%20ut%20labore%20et%20dolore%20magna%20aliqua.%20Ut%20enim%20ad%20minim%20veniam,%20quis%20nostrud%20exercitation%20ullamco%20laboris%20nisi%20ut%20aliquip%20ex%20ea%20commodo%20consequat.%20Duis%20aute%20irure%20dolor%20in%20reprehenderit%20in%20voluptate%20velit%20esse%20cillum%20dolore%20eu%20fugiat%20nulla%20pariatur.%20Excepteur%20sint%20occaecat%20cupidatat%20non%20proident,%20sunt%20in%20culpa%20qui%20officia%20deserunt%20mollit%20anim%20id%20est%20laborum.";

        $this->rotateMatrix = [["A","B","C","D"],["E","F","G","H"],["I","J","K","L"],["M","N","O","P"]];
        $this->rotatedMatrix = [["M","I","E","A"],["N","J","F","B"],["O","K","G","C"],["P","L","H","D"]];


        $this->zeroMatrix = [["A","B","C","D"],["E","F","G","H"],["I","J","K","L"],["M","N","0","P"],["R","S","T","U"]];
        $this->zeroResultMatrix = [["A","B","0","D"],["E","F","0","H"],["I","J","0","L"],["0","0","0","0"],["R","S","0","U"]];
    }

    /**
     * 1.1 implement an algorithm to determine if a string has all unique characters.
     * What if you cannot use additional data structures?
     */
    public function testUniqueChars()
    {
        $result = false;
        foreach ($this->unique as $key => $value) {
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
        foreach ($this->unique as $key => $value) {
            $result = $this->object->isUniqueChars2($key) == $value;
        }
        $this->assertTrue($result);
    }


    /**
     * 1.2 Implement a function void reverse(char* str) in Cor C++
     * which reverses a null-terminated string.
     */
    public function testReverse()
    {
        foreach($this->trueReverse as $key => $value){
            $this->assertTrue($this->object->reverse($key) == $value);
        }
        foreach($this->wrongReverse as $key => $value){
            $this->assertFalse($this->object->reverse($key) == $value);
        }
    }

    /**
     * 1.3 Given two strings, write a method to decide if one is a permutation of the other.
     */
    public function testCheckPermutation()
    {
        $array = $this->permutation1;
        if (!empty($array)) {
            $result = false;
            for ($i = 1; $i < sizeof($array); $i++) {
                $result = $this->object->checkPermutation($array[$i-1], $array[$i]);
            }
            $this->assertTrue($result);
        }
    }

    /**
     * 1.3 Given two strings, write a method to decide if one is a permutation of the other.
     */
    public function testCheckPermutation2()
    {
        $array = $this->permutation2;
        if (!empty($array)) {
            $result = false;
            for ($i = 1; $i < sizeof($array); $i++) {
                $result = $this->object->checkPermutation2($array[$i-1], $array[$i]);
            }
            $this->assertTrue($result);
        }
    }

    /**
     * 1.3 Given two strings, write a method to decide if one is a permutation of the other.
     */
    public function testCheckPermutation3()
    {
        $array = $this->permutation2;
        if (!empty($array)) {
            $result = false;
            for ($i = 1; $i < sizeof($array); $i++) {
                $result = $this->object->checkPermutation3($array[$i-1], $array[$i]);
            }
            $this->assertTrue($result);
        }
    }

    /**
     * 1.4 Write a method to replace all spaces in a string with '%20'.
     * You may assume that the string has sufficient space at the end
     * of the string to hold the additional characters, and that you
     * are given the "true" length of the string. (Note: if implementing
     * in Java,please use a character array so that you can perform
     * this operation in place.)
     */
    public function testReplaceSpaces()
    {
        $this->assertTrue($this->object->replaceSpaces($this->spaces) == $this->replaced);
    }

    /**
     * 1.5 Implement a method to perform basic string compression using the counts of
     * repeated characters. For example, the string aabcccccaaa would become
     * a2blc5a3. If the "compressed" string would not become smaller than the original
     * string, your method should return the original string.
     */
    public function testBadCompressString()
    {
        $this->assertTrue($this->object->compressBad($this->compress[0])==$this->compress[1]);
    }

    /**
     * 1.6 Given an image represented by an NxN matrix, where each pixel in the image is 4
     * bytes, write a method to rotate the image by 90 degrees. Can you do this in place?
     *
     * [A,B,C,D] [M,I,E,A]
     * [E,F,G,H] [N,J,F,B]
     * [I,J,K,L] [O,K,G,C]
     * [M,N,O,P] [P,L,H,D]
     *
     */
    public function testRotateMatrix()
    {
        $this->assertTrue($this->object->rotateMatrix($this->rotateMatrix) == $this->rotatedMatrix);
    }

    /**
     * 1.7 Write an algorithm such that if an element in an MxN matrix is 0, its entire
     * row and column are set to 0.
     */
    public function testZeroMatrix()
    {
        $this->assertTrue($this->object->setZeros($this->zeroMatrix) == $this->zeroResultMatrix);
    }

    /**
     * 1.8 Assume you have a method isSubstring which checks if one word is a substring
     * of another. Given two strings, si and s2, write code to check Ifs2 is a rotation of si
     * using only onecallto isSubstring (e.g., "waterbottLe" is a rotation of "erbottLewat").
     */
    public function testCheckRotation()
    {
        $this->assertTrue($this->object->isRotation("waterbottLe","erbottLewat"));
    }
}
