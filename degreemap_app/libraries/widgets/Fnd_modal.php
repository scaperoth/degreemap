<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Fnd_modal {

    /**
     * Creates opening foundation modal block
     * @param array $modal creates foundation modal array(). options include 'call_to_action', 'id'
     * @param array $html_options additional HTML attributes.
     * @param type $modal_div_options addition HTML attributes for modal div
     * @return string $output modal in html
     */
    public static function start_modal($modal = array(), $html_options = array(), $modal_div_options = array()) {

        //id of modal div
        $html_options['data-reveal-id'] = Fnd_Array::popValue('id', $modal, 'm-' . rand(0, 100));

        //text for link to open modal
        $call_to_action = Fnd_Array::popValue('call_to_action', $modal, 'Click Me');

        //link to open modal
        $link = Fnd_HTML::link($call_to_action, '#', $html_options);

        //fill in default options for modal div
        $modal_div_options['id'] = $html_options['data-reveal-id'];
        Fnd_HTML::addCssClass('reveal-modal', $modal_div_options);
        $modal_div_options['data-reveal'] = '';
        Fnd_HTML::addCssClass('reveal-modal', $modal_div_options);

        //putting it all together
        $output = $link;

        $output .= Fnd_HTML::openTag('div', $modal_div_options);

        return $output;
    }
    
    /**
     * closes out the modal block
     * @return string closeout elements of modal
     */
    public static function end_modal() {
        //generate close button for modal
        $close_link = Fnd_HTML::link("&#215;", '', array('class' => 'close-reveal-modal'));

        $output = $close_link;

        $output.= '</div>';
        
        return $output;
    }

}
