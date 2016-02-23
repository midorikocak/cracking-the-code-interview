<?php

namespace MidoriKocak\ConceptsAlgorithms;

use Mtkocak\DataStructures;

/**
 * Class LinkedLists
 * @package MidoriKocak\ConceptsAlgorithms
 */
class LinkedLists
{
    /**
     * @param DataStructures\SingleLinkedListNode $node
     */
    public function deleteDups(DataStructures\SingleLinkedListNode &$node)
    {
        // In php arrays are hash tables
        $table = [];
        $previous = null;
        while ($node != null) {
            if (isset($table[$node->get()])) {
                $previous->next($node->next());
            } else {
                $table[$node->get()] = true;
                $previous = $node;
            }
            $node = $node->next();
        }
    }

    /**
     * @param DataStructures\SingleLinkedListNode $node
     */
    public function deleteDups2(DataStructures\SingleLinkedListNode &$node)
    {

        if ($node == null) return;
        $current = $node;

        while ($current != null) {
            $runner = $current;
            while ($runner->next() != null) {
                if ($runner->next()->get() == $current->get()) {
                    $runner->next($runner->next()->next());
                } else {
                    $runner = $runner->next();
                }
            }
            $current = $current->next();
        }
    }

    /**
     * @param DataStructures\SingleLinkedListNode $head
     * @param $size
     * @return int
     */
    public function nthToLast(DataStructures\SingleLinkedListNode $head, $size)
    {
        if ($head == null) {
            return 0;
        }

        $i = $this->nthToLast($head->next(), $size) + 1;
        if ($i == $size) {
            echo $head->get();
        }
        return $i;
    }

    /**
     * @param DataStructures\SingleLinkedListNode $head
     * @param $k
     * @param $i
     * @return DataStructures\SingleLinkedListNode|null
     */
    public function nthToLast2(DataStructures\SingleLinkedListNode $head = null, $k, &$i)
    {
        if ($head == null) {
            return null;
        }
        $node = $this->nthToLast2($head->next(), $k, $i);
        $i++;
        if ($k == $i) {
            return $head;
        }

        return $node;
    }

    /**
     * @param DataStructures\SingleLinkedListNode $head
     * @param $counter
     * @return DataStructures\DataStructureNode|DataStructures\SingleLinkedListNode|null
     */
    public function nthToLast3(DataStructures\SingleLinkedListNode $head, $counter)
    {
        if ($counter <= null) {
            return null;
        }

        $pointer1 = $head;
        $pointer2 = $head;

        // go $counter nodes first
        for ($i = 0; $i < $counter - 1; $i++) {
            $pointer2 = $pointer2->next();
        }

        if ($pointer2 == null) return null;

        while ($pointer2->next() != null) {
            $pointer1 = $pointer1->next();
            $pointer2 = $pointer2->next();
        }

        return $pointer1;
    }

    /**
     * @param DataStructures\SingleLinkedList $list
     * @return null
     */
    public function goToMiddleNode(DataStructures\SingleLinkedList &$list)
    {
        $pointer1 = $list->bottom;
        $pointer2 = $list->bottom;
        while ($pointer2->next() != null) {
            $pointer1 = $pointer1->next();
            $pointer2 = $pointer2->next()->next();
        }
        return $pointer1;
    }

    /**
     * @param DataStructures\SingleLinkedListNode $node
     */
    public function deleteNode(DataStructures\SingleLinkedListNode &$node)
    {
        if ($node == null || $node->next() == null) {
            return false;
        }
        $next = $node->next();
        $node->set($next->get());
        $node->next($next->next());
        unset($next);
    }

    /**
     * @param DataStructures\SingleLinkedListNode $node
     * @param $x
     * @return DataStructures\SingleLinkedListNode|null
     */
    public function partition(DataStructures\SingleLinkedListNode $node, $x)
    {
        $beforeStart = null;
        $beforeEnd = null;
        $afterStart = null;
        $afterEnd = null;

        while ($node != null) {
            $next = $node->next();
            $newNode = new DataStructures\SingleLinkedListNode($node->get());
            if ($node->get() < $x) {
                if ($beforeStart == null) {
                    $beforeStart = $newNode;
                    $beforeEnd = $beforeStart;
                } else {
                    $beforeEnd->next($newNode);
                    $beforeEnd = $newNode;
                }
            } elseif ($node->get() > $x) {
                if ($afterStart == null) {
                    $afterStart = $newNode;
                    $afterEnd = $newNode;
                } else {
                    $afterEnd->next($newNode);
                    $afterEnd = $newNode;
                }
            } else {
                $middleNode = $newNode;
            }
            $node = $next;
        }

        if ($beforeStart == null) {
            return $afterStart;
        }

        $beforeEnd->next($middleNode);
        $middleNode->next($afterStart);
        return $beforeStart;
    }

    /**
     * @param DataStructures\SingleLinkedListNode $node
     * @param $x
     * @return DataStructures\SingleLinkedListNode|null
     */
    public function partition2(DataStructures\SingleLinkedListNode $node, $x)
    {
        $beforeStart = null;
        $afterStart = null;
        while ($node != null) {
            $next = $node->next();
            $newNode = new DataStructures\SingleLinkedListNode($node->get());
            if ($node->get() < $x) {
                $newNode->next($beforeStart);
                $beforeStart = $newNode;
            } elseif ($node->get() > $x) {
                $newNode->next($afterStart);
                $afterStart = $newNode;
            } else {
                $middleNode = $newNode;
            }
            $node = $next;
        }
        //$beforeStart->next($middleNode);
        $middleNode->next($afterStart);
        if ($beforeStart == null) {
            return $afterStart;
        }
        $head = $beforeStart;
        while ($beforeStart->next() != null) {
            $beforeStart = $beforeStart->next();
        }
        $beforeStart->next($middleNode);

        return $head;
    }

    public function addLists(DataStructures\SingleLinkedListNode $node1, DataStructures\SingleLinkedListNode $node2, $carry){

    }

    public function addLists2(DataStructures\SingleLinkedListNode $node1, DataStructures\SingleLinkedListNode $node2, $carry){

    }
}