<?php
namespace MidoriKocak\Amazon;

interface ICached{
    public function getItem($id);
    public function putItem($item);
}

class CachedList implements ICached{

    const LIMIT = 50;

    // Instead of using timestamp, using a time queue is better for now.
    // Deleting etc. not implemented.
    private $queue;
    private $cacheArray;
    private $persistedArray;

    public function __construct(){
        $this->cacheArray = new SplFixedArray(LIMIT);
        $this->persistedArray = array();
        $this->timeArray = array();
    }

    public  function getItem($id){
        if(isset($this->cacheArray[$id])){
            return $this->cacheArray[$id];
        }
        else{
            $item = $this->persistedArray[$id];
            $this->cacheItem($id,$item);
            return $item;
        }
    }

    public function putItem($item){
        $id = uniqid();

        if(sizeof($this->cacheArray)==LIMIT){
            // Remove element from fixed Array
            $this->cacheArray->offsetUnset($this->cacheArray[$this->findOldestItem()]);
        }

        $this->cacheArray[$id] = $item;
        $this->persistedArray[$id] = $item;
        array_push($queue,$id);
    }

    private function cacheItem($id,$item){
        if(sizeof($this->cacheArray)==LIMIT){
            // Remove element from fixed Array
            $this->cacheArray->offsetUnset($this->cacheArray[$this->findOldestItem()]);
        }
        $this->cacheArray[$id] = $item;
        array_push($queue,$id);
    }

    private function findOldestItem(){
        // Remove from beginning
        return array_shift($this->queue);
    }

}