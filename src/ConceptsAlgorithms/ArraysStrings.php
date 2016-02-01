<?php
namespace MidoriKocak\ConceptsAlgorithms;


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

}