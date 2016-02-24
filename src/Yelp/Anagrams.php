<?php
namespace MidoriKocak\Yelp;

interface AnagramChecker
{
    public function checkArray($array);
}

class Anagrams implements AnagramChecker
{

    private function cleanWord($word)
    {
        return mb_strtolower(str_replace(' ', '', $word));
    }

    public function checkArray($array)
    {
        if (!empty($array)) {
            $compareArray = $this->makeArray($array[0]);
            $result = false;
            for ($i = 1; $i < sizeof($array); $i++) {
                $result = $this->compare($compareArray, $array[$i]);
            }
            return $result;
        }
        return false;
    }

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


    private function compare($array, $word2)
    {
        $array2 = $this->makeArray($word2);
        if ($array == $array2) {
            return true;
        }
        return false;
    }

}