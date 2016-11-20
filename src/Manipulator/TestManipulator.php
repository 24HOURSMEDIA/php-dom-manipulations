<?php
/**
 * Date: 20/11/2016
 */

namespace T4\DomManipulations\Manipulator;


use T4\DomManipulations\DomManipulatorInterface;


class TestManipulator implements DomManipulatorInterface
{

    function modify(\DOMDocument $doc, $options = [])
    {
        foreach ($doc->getElementsByTagName('*') as $n) {
            if ($n->nodeName == 'div') {
                $n->setAttribute('test', 'new');
            }
        }
    }


}