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
    function modify(\DOMDocument $doc, $utm_source = '', $utm_medium = '', $utm_campaign = '', $utm_content = '', $utm_term = '')
    {
        $links = $doc->getElementsByTagName('a');
        /* @var $links \DOMElement[] */
        foreach ($links as $link) {
            $href = $link->getAttribute('href');
            if ($href && $href[0] != '#') {
                $fields = ['utm_source' => $utm_source, 'utm_medium' => $utm_medium, 'utm_campaign' => $utm_campaign, 'utm_content' => $utm_content, 'utm_term' => $utm_term];
                $appendQuery = [];
                foreach ($fields as $k => $v) {
                    if ($v) {
                        // unset existing field..
                        $href = str_replace($v.'=', '_'.$v.'=', $href);
                        $appendQuery[] = urlencode($k) . '=' . urlencode($v);
                    }

                }
                $href.= (strstr($href, '?')) ? '&' : '?';
                $href.= implode('&', $appendQuery);
                $link->setAttribute('href', $href);
            }

        }
    }


}