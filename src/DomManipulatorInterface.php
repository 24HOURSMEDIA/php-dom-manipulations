<?php
/**
 * Date: 20/11/2016
 */

namespace T4\DomManipulations;


interface DomManipulatorInterface
{

    function modify(\DOMDocument $doc);

}