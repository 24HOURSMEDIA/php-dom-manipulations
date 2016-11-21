<?php

/**
 * Date: 20/11/2016
 */
class GaAddCampaignToLinksTest extends \PHPUnit_Framework_TestCase
{

    function testModify() {

        $html = '<div><a href="test.html">a</a><a href="test2.html">a</a><a href="#test">c</a></div>';
        $doc = new \DOMDocument();
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $m = new \T4\DomManipulations\Manipulator\Ga\GaAddCampaignToLinks();
        $m->modify($doc, '_src');
        //$m->modify($doc, 'newsletter-week14', 'email', 'spring');
        $newHtml = $doc->saveHTML();
        $this->assertContains('utm_source="_src"', $newHtml);

        // do not modify anchors test
        $html = '<a href="#">test</a>';

        $doc = new \DOMDocument();
        $doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $m = new \T4\DomManipulations\Manipulator\Ga\GaAddCampaignToLinks();
        $m->modify($doc);
        $newHtml = $doc->saveHTML();
        $this->assertNotContains('utm_campaign', $newHtml);


        // test invalid html
        $doc = new \DOMDocument();

        $doc->strictErrorChecking = false;
        libxml_use_internal_errors(true);

        $doc->loadHTML('</div><strong>test <a href="test">test</a>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $m = new \T4\DomManipulations\Manipulator\Ga\GaAddCampaignToLinks();
        $m->modify($doc);
        $newHtml = $doc->saveHTML();
        $this->assertNotContains('utm_campaign', $newHtml);


    }

}