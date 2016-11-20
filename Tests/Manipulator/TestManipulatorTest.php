<?php

/**
 * Date: 20/11/2016
 */
class TestManipulatorTest extends \PHPUnit_Framework_TestCase
{

    function testManipulate() {

        $html = '<div id="root"><div test="ORG"></div><span><div test="ORG"></div></span></div>';

        $doc = new DOMDocument();
        $doc->loadHTML($html);

        $manipulator = new \T4\DomManipulations\Manipulator\TestManipulator();
        $manipulator->modify($doc);

        $html = $doc->saveHTML();
        $this->assertNotContains('ORG', $html);

    }




}