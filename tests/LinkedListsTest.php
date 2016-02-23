<?php
use MidoriKocak\ConceptsAlgorithms\LinkedLists;
use Mtkocak\DataStructures;

class LinkedListsTest extends \PHPUnit_Framework_TestCase
{

    public $object;
    public $linkedListWithDuplicate;
    public $linkedListWithNoDuplicate;
    public $linkedListTest;
    public $middleDeleted;
    public $unsorted;
    public $partitioned;

    public function setup()
    {
        $this->object = new LinkedLists();

        $this->linkedListWithDuplicate = new DataStructures\SingleLinkedList();
        $this->linkedListWithDuplicate->add("1");
        $this->linkedListWithDuplicate->add("2");
        $this->linkedListWithDuplicate->add("3");
        $this->linkedListWithDuplicate->add("3");
        $this->linkedListWithDuplicate->add("4");

        $this->linkedListWithNoDuplicate = new DataStructures\SingleLinkedList();
        $this->linkedListWithNoDuplicate->add("1");
        $this->linkedListWithNoDuplicate->add("2");
        $this->linkedListWithNoDuplicate->add("3");
        $this->linkedListWithNoDuplicate->add("4");

        $this->linkedListTest = new DataStructures\SingleLinkedList();
        $this->linkedListTest->push("1");
        $this->linkedListTest->push("2");
        $this->linkedListTest->push("3");
        $this->linkedListTest->push("4");
        $this->linkedListTest->push("5");
        $this->linkedListTest->push("6");
        $this->linkedListTest->push("7");
        $this->linkedListTest->push("8");
        $this->linkedListTest->push("9");


        $this->unsorted = new DataStructures\SingleLinkedList();
        $this->unsorted->push("1");
        $this->unsorted->push("6");
        $this->unsorted->push("9");
        $this->unsorted->push("8");
        $this->unsorted->push("3");
        $this->unsorted->push("2");
        $this->unsorted->push("5");
        $this->unsorted->push("7");
        $this->unsorted->push("4");


        $this->middleDeleted = new DataStructures\SingleLinkedList();
        $this->middleDeleted->push("1");
        $this->middleDeleted->push("2");
        $this->middleDeleted->push("3");
        $this->middleDeleted->push("4");
        $this->middleDeleted->push("6");
        $this->middleDeleted->push("7");
        $this->middleDeleted->push("8");
        $this->middleDeleted->push("9");

        $this->partitioned = new DataStructures\SingleLinkedList();
        $this->partitioned->push("1");
        $this->partitioned->push("3");
        $this->partitioned->push("2");
        $this->partitioned->push("4");
        $this->partitioned->push("5");
        $this->partitioned->push("6");
        $this->partitioned->push("9");
        $this->partitioned->push("8");
        $this->partitioned->push("7");

        $this->partitioned2 = new DataStructures\SingleLinkedList();
        $this->partitioned2->push("4");
        $this->partitioned2->push("2");
        $this->partitioned2->push("3");
        $this->partitioned2->push("1");
        $this->partitioned2->push("5");
        $this->partitioned2->push("7");
        $this->partitioned2->push("8");
        $this->partitioned2->push("9");
        $this->partitioned2->push("6");
    }

    /**
     * 2.1 Write code to remove duplicates from an unsorted linked list.
     * FOLLOW UP
     * How would you solve this problem if a temporary buffer is not allowed?
     */
    public function testDeleteDups()
    {
        $node = $this->linkedListWithDuplicate->bottom;
        $this->object->deleteDups($node);
        //bottom of Linked lists gives us the linked list chain of elements only for comparation
        $this->assertTrue($this->linkedListWithNoDuplicate->bottom == $this->linkedListWithDuplicate->bottom);
    }

    /**
     * 2.1 Write code to remove duplicates from an unsorted linked list.
     * FOLLOW UP
     * How would you solve this problem if a temporary buffer is not allowed?
     */
    public function testDeleteDups2()
    {
        $node = $this->linkedListWithDuplicate->bottom;
        $this->object->deleteDups2($node);
        //bottom of Linked lists gives us the linked list chain of elements only for comparation
        $this->assertTrue($this->linkedListWithNoDuplicate->bottom == $this->linkedListWithDuplicate->bottom);
    }

    /**
     * 2.2 Implement an algorithm to find the kth to last element of a singly linked list.
     */
    public function testNthToLast()
    {
        $i = 0;
        // $k  is element count???
        $this->assertTrue($this->object->nthToLast2($this->linkedListTest->bottom, 3, $i)->get() == 7);
    }

    /**
     * 2.2 Implement an algorithm to find the kth to last element of a singly linked list.
     */
    public function testNthToLast2()
    {
        $counter = 3;
        $this->assertTrue($this->object->nthToLast3($this->linkedListTest->bottom, $counter)->get() == 7);
    }

    public function testGoToMiddleNode()
    {
        $this->assertTrue($this->object->goToMiddleNode($this->linkedListTest)->get() == 5);

    }

    /** 2.3 Implement an algorithm to delete a node in the middle of a singly linked list,
     * given only access to that node.
     */
    public function testDeleteNode()
    {
        $middleNode = $this->object->goToMiddleNode($this->linkedListTest);
        $this->object->deleteNode($middleNode);
        $this->assertTrue($this->linkedListTest->bottom == $this->middleDeleted->bottom);
    }

    /**
     * 2.4 Write code to partition a linked list around a value x, such that all nodes less than x
     * come before alt nodes greater than or equal to x.
     */
    public function testPartition()
    {
        $this->assertTrue($this->object->partition($this->unsorted->bottom, 5) == $this->partitioned->bottom);
    }

    /**
     * 2.4 Write code to partition a linked list around a value x, such that all nodes less than x
     * come before alt nodes greater than or equal to x.
     */
    public function testPartition2()
    {
        $this->assertTrue($this->object->partition2($this->unsorted->bottom, 5) == $this->partitioned2->bottom);
    }

    /**
     * 2.5 You have two numbers represented by a linked list, where each node contains a
     * single digit. The digits are stored in reverse order, such that the 1 's digit is at the head
     * of the list. Write a function that adds the two numbers and returns the sum as a
     * linked list.
     *
     * unsorted 75238961 partitioned2 698751324 sum 773990285
     *
     * FOLLOW UP
     * Suppose the digits are stored in forward order. Repeat the above problem.
     * unsorted 16983257 partitioned2 423157896 sum 440141153
     *
     */
    public function testAddLists()
    {
        $this->assertTrue(true);
    }
}
