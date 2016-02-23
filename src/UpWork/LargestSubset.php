<?php
/**
 * Created by PhpStorm.
 * User: mtkocak
 * Date: 23/02/16
 * Time: 22:54
 */

namespace MidoriKocak\UpWork;


class LargestSubset {


    /**
     * Largest repeated subset.
     * Find the longest repeated subset of array elements in given array. For example,
     * for array('b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n')
     * the longest repeated subset will be array('n','f','o','x').
     *
     * @param array $list
     * @return array
     */
    public static function solve(Array $list) {
        $size = sizeof($list);
        $counter = sizeof($list);
        if(empty($list) || $size == 1){
            return null;
        }
        while($counter!=0){
            $chunkSize = $counter;;
            $chunkSlices = array();
            for($i=0;$i< $size - $chunkSize + 1;$i = $i+1){
                $chunk = array_slice($list,$i,$chunkSize);
                if(!in_array($chunk,$chunkSlices)){
                    array_push($chunkSlices,$chunk);
                }
                else{
                    return $chunk;
                }
            }
            $counter--;
        }
    }
} 