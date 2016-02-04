<?php

namespace MidoriKocak\ConceptsAlgorithms;


/**
 * Class ArraysStrings
 * @package MidoriKocak\ConceptsAlgorithms
 */
/**
 * Class ArraysStrings
 * @package MidoriKocak\ConceptsAlgorithms
 */
class ArraysStrings
{

    /**
     * Remove whitespaces from string and make it lowercase
     *
     * @param $word
     * @return string
     */
    private function cleanWord($word)
    {
        return mb_strtolower(str_replace(' ', '', $word));
    }

    /**
     * Assume ASCII Strings. ord() returns integer value of ascii string's first char.
     * Similar to bucket sort. Use values as keys.
     *
     * @param String $string
     * @return bool
     */
    public function isUniqueChars(String $string)
    {
        if (strlen($string) > 256 || strlen($string) == 0) {
            return false;
        }

        $char_set = [];
        for ($i = 0; $i < strlen($string); $i++) {
            $value = ord($string[$i]);
            if (isset($char_set[$value])) {
                return false;
            }
            $char_set[$value] = true;
        }
        return true;
    }

    /**
     * @param String $string
     * @return bool
     */
    public function isUniqueChars2(String $string)
    {
        if (strlen($string) > 256 || strlen($string) == 0) {
            return false;
        }

        $checker = 0;
        $cleanedString = $this->cleanWord($string);

        /* $char = 'e', 'e'-'a' = 4, $value = 4
         * shift one as value integer. 00000001 becomes
         * shift 1 by 4 bits, 0b00010000 = 16, creates unique int vector
         * for each character.
         */
        for ($i = 0; $i < strlen($cleanedString); $i++) {
            $value = ord($cleanedString[$i] - ord("a"));
        }
        if (($checker & (1 << $value)) > 0) {
            return false;
        }
        $checker |= (1 << $value);
        return true;
    }

    /**
     * @param String $string
     * @return string
     */
    public function reverse(String $string)
    {
        $reverse = "";
        if ($string != "") {
            for ($i = strlen($string) - 1; $i >= 0; $i--) {
                $reverse .= $string[$i];
            }
        }
        return $reverse;
    }

    /**
     * @param $word
     * @return array
     */
    private function makeArray($word)
    {
        $uniqueArray = [];
        $cleanedWord = $this->cleanWord($word);
        for ($i = 0; $i < strlen($cleanedWord); $i++) {
            if (isset($uniqueArray[$cleanedWord[$i]])) {
                $uniqueArray[$cleanedWord[$i]]++;
            } else {
                $uniqueArray[$cleanedWord[$i]] = 1;
            }
        }
        return $uniqueArray;
    }


    /**
     * @param String $word1
     * @param String $word2
     * @return bool
     */
    public function checkPermutation(String $word1, String $word2)
    {
        $array1 = $this->makeArray($word1);
        $array2 = $this->makeArray($word2);
        if ($array1 == $array2) {
            return true;
        }
        return false;
    }

    /**
     * @param String $word1
     * @param String $word2
     * @return bool
     */
    public function checkPermutation2(String $word1, String $word2)
    {
        $stringArray1 = str_split($word1);
        $stringArray2 = str_split($word2);
        if (sort($stringArray1) == sort($stringArray2)){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * @param String $word1
     * @param String $word2
     * @return bool
     */
    public function checkPermutation3(String $word1, String $word2)
    {
        if(strlen($word1)!=strlen($word2)){
            return false;
        }

        $charArray = [];
        for($i = 0; $i<strlen($word1); $i++){
            if(!isset($charArray[$word1[$i]])){
                $charArray[$word1[$i]]=1;
            }else{
                $charArray[$word1[$i]]++;
            }
        }
        for($j = 0; $j<strlen($word2); $j++){
            if(--$charArray[$word2[$j]]>0){
                return false;
            }
        }
        return true;
    }

    /**
     * @param String $string
     */
    public function replaceSpaces(String $string)
    {
        $spaceCount = 0;
        $newLength = strlen($string);
        // first pass for counting spaces
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == " ") {
                $spaceCount++;
            }
        }

        $newLength += ($spaceCount * 2);

        for ($j = strlen($string) - 1; $j >= 0; $j--) {
            if ($string[$j] == " ") {
                $string[$newLength - 1] = "0";
                $string[$newLength - 2] = "2";
                $string[$newLength - 3] = "%";

                $newLength -= 3;
            } else {
                $string[$newLength - 1] = $string[$j];
                $newLength -= 1;
            }
        }
        return $string;
    }

    /**
     * @param String $string
     * @return string
     */
    public function compressBad(String $string)
    {
        $result = "";
        $last = $string[0];
        $count = 1;
        for ($i = 1; $i < strlen($string); $i++) {
            if ($string[$i] == $last) {
                $count++;
            } else {
                $result .= $last . $count;
                $last = $string[$i];
                $count = 1;
            }
        }
        return $result . $last . $count;
    }

    /* I did not understand the remaining solutions.
    public function compressBetter(String $string)
    {

    }

    public function compressAlternate(String $string)
    {

    }
    */

    /**
     * @param array $array
     * @return array
     */
    public function rotateMatrix(Array $array){
        $size = sizeof($array[0]);
        $rotatedArray = [];
        for($column = 0; $column<$size; $column++){
            for($row = $size-1; $row >=0 ; $row--){
                $elementToCopy = $array[$row][$column];
                $rotatedArray[$column][$size-$row-1] = $elementToCopy;
            }
        }
        return $rotatedArray;
    }

    /**
     * @param array $matrix
     * @return array
     */
    public function setZeros(Array $matrix){
        $row = [];
        $column = [];

        // Traverse Matrix
        for($i = 0; $i<sizeof($matrix);$i++){
            for($j=0;$j<sizeof($matrix[$i]);$j++){
                if($matrix[$i][$j]==0){
                    $row[$i] = true;
                    $column[$j] = true;
                }
            }
        }

        for($i = 0; $i<sizeof($matrix);$i++) {
            for ($j = 0; $j < sizeof($matrix[$i]); $j++) {
                if($row[$i] || $column[$j]){
                    $matrix[$i][$j] = 0;
                }
            }
        }
        return $matrix;
    }

    /**
     * @param String $word1
     * @param String $word2
     * @return bool
     */
    public function isRotation(String $word1, String $word2){
        $len = strlen($word1);

        if($len == strlen($word2) && $len > 0){
            $word1word2 = $word1.$word2;
            return (strpos($word1word2, $word2)!= false);
        }
        return false;
    }

}