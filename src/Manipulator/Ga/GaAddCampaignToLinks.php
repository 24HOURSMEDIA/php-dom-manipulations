<?php
/**
 * Date: 20/11/2016
 */

namespace T4\DomManipulations\Manipulator\Ga;


use T4\DomManipulations\DomManipulatorInterface;

/**
 * Class GaAddCampaignToLinks
 * Modifies all links that are not anchors to include a google campaign
 */
class GaAddCampaignToLinks implements DomManipulatorInterface
{
    /**
     * @param \DOMDocument $doc
     */
    function modify(\DOMDocument $doc, $utm_source = '', $utm_medium = '', $utm_campaign = '')
    {
        $links = $doc->getElementsByTagName('a');
        /* @var $links \DOMElement[] */
        foreach ($links as $link) {
            $href = $link->getAttribute('href');
            if ($href && $href[0] != '#') {
                if ($utm_source) {
                    $link->setAttribute('utm_source', $utm_source);
                } else {
                    $link->removeAttribute('utm_source');
                }
                if ($utm_medium) {
                    $link->setAttribute('utm_medium', $utm_medium);
                } else {
                    $link->removeAttribute('utm_medium');
                }
                if ($utm_campaign) {
                    $link->setAttribute('utm_campaign', $utm_campaign);
                } else {
                    $link->removeAttribute('utm_campaign');
                }
                $link->removeAttribute('utm_term');
                $link->removeAttribute('utm_content');
            }

        }
    }


}