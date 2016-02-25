<?php
use MidoriKocak\UpWork\Teaser;

class TeaserTest extends \PHPUnit_Framework_TestCase
{
    public $content;
    public $teaser;

    public function setup()
    {
        $this->content = "I quickly learned how fishy this world could be. A client I knew who\nspecialized in auto loans invited me up to his desk to show me how\nto structure subprime debt. Eager to please, I promised I could\nenhance my software to model his deals in less than a month. But when\nI glanced at the takeout in the deal, I couldn't believe my eyes.";
        $this->teaser = "I quickly learned how fishy this world could be. A client I knew who\nspecialized in auto loans invited me up to his desk to show me how\nto structure subprime debt. Eager to please, I<a href='mynameismidori.com'>Midori</a>";
    }

    public function testSolve()
    {
        $teaser = Teaser::makeTeaser($this->content,"mynameismidori.com","Midori",138);
        $this->assertTrue($teaser == $this->teaser);
    }
}