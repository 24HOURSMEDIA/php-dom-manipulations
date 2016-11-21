# php-dom-manipulations

A library to manipulate dom.



## Manipulators

#### GaAddCampaignToLinks

Add google analytics campaign information to all links in a document.

Usage:

```
$html = '<a href="test.html">a</a><a href="test2.html">a</a><a href="#test">c</a>';
$doc = new \DOMDocument();
$doc->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
$m = new \T4\DomManipulations\Manipulator\Ga\GaAddCampaignToLinks();
// source, medium, campaign
$m->modify($doc, 'newsletter-week14', 'email', 'spring');
$newHtml = $doc->saveHTML();

// $newHtml example output
// <div><a href="test.html?utm_source=_src&amp;utm_medium=_medium&amp;utm_campaign=_campaign">a</a><a href="test2.html?utm_source=_src&amp;utm_medium=_medium&amp;utm_campaign=_campaign">a</a><a href="#test">c</a></div>

        
```