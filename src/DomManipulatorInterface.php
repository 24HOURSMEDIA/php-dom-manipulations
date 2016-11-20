<?php
/**
 * Date: 20/11/2016
 */

namespace T4\DomManipulations;


interface DomManipulatorInterface
{

    /**
     * Do something with the elements in the dom..
     * @param \DOMDocument $doc
     * @return mixed
     */
    function modify(\DOMDocument $doc);

}