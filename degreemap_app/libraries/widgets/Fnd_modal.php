<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Fnd_modal {

    /**
     * Creates foundation modal
     * @param array $modal creates foundation modal array(). options include 'call_to_action', 'id', 'header', and 'content'
     * @param array $html_options additional HTML attributes.
     * @param type $modal_div_options
     * @return string $output modal in html
     */
    public static function modal($modal = array(), $html_options = array(), $modal_div_options = array()) {

        //id of modal div
        $html_options['data-reveal-id'] = Fnd_Array::popValue('id', $modal, 'm-' . rand(0, 100));

        //text for link to open modal
        $call_to_action = Fnd_Array::popValue('call_to_action', $modal, 'Click Me');

        //link to open modal
        $link = Fnd_HTML::link($call_to_action, '#', $html_options);

        //create content for modal
        $header = Fnd_Array::popValue('header', $modal, '');
        $content = Fnd_Array::popValue('content', $modal, "");

        //generate close button for modal
        $close_link = Fnd_HTML::link("&#215;", '', array('class' => 'close-reveal-modal'));

        //fill in default options for modal div
        $modal_div_options['id'] = $html_options['data-reveal-id'];
        Fnd_HTML::addCssClass('reveal-modal', $modal_div_options);
        $modal_div_options['data-reveal'] = '';
        Fnd_HTML::addCssClass('reveal-modal', $modal_div_options);

        if ($header !== '') {
            $header = Fnd_HTML::tag('h2', array(), $header);
        }

        //putting it all together
        $output = $link;

        $output .= Fnd_HTML::openTag('div', $modal_div_options);

        $output.= $header;

        $output.= $content;

        $output .= $close_link;

        $output.= '</div>';

        return $output;
    }

}
