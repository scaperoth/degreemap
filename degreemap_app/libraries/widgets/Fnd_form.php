<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Fnd_form {

    /**
     * 
     * @param type $form_options
     * @param array $html_options
     * @return type
     */
    public static function start_form($form_args = array(), $html_options = array()) {
        $html_options['method'] = Fnd_Array::popValue('method', $form_args, 'POST');
        $html_options['action'] = Fnd_Array::popValue('route', $form_args, '');
        
        return Fnd_HTML::tag('form', $html_options);
        /*

          <form>
          <div class="row collapse">
          <div class="small-3 large-2 columns">
          <span class="prefix">http://</span>
          </div>
          <div class="small-9 large-10 columns">
          <input type="text" placeholder="Enter your URL...">
          </div>
          </div>
          <div class="row">
          <div class="large-12 columns">
          <div class="row collapse">
          <div class="small-10 columns">
          <input type="text" placeholder="Hex Value">
          </div>
          <div class="small-2 columns">
          <a href="#" class="button postfix">Go</a>
          </div>
          </div>
          </div>
          </div>
          <div class="row">
          <div class="large-6 columns">
          <div class="row collapse prefix-radius">
          <div class="small-3 columns">
          <span class="prefix">Label</span>
          </div>
          <div class="small-9 columns">
          <input type="text" placeholder="Value">
          </div>
          </div>
          </div>
          <div class="large-6 columns">
          <div class="row collapse postfix-radius">
          <div class="small-9 columns">
          <input type="text" placeholder="Value">
          </div>
          <div class="small-3 columns">
          <span class="postfix">Label</span>
          </div>
          </div>
          </div>
          </div>
          <div class="row">
          <div class="large-6 columns">
          <div class="row collapse prefix-round">
          <div class="small-3 columns">
          <a href="#" class="button prefix">Go</a>
          </div>
          <div class="small-9 columns">
          <input type="text" placeholder="Value">
          </div>
          </div>
          </div>
          <div class="large-6 columns">
          <div class="row collapse postfix-round">
          <div class="small-9 columns">
          <input type="text" placeholder="Value">
          </div>
          <div class="small-3 columns">
          <a href="#" class="button postfix">Go</a>
          </div>
          </div>
          </div>
          </div>
          </form>
         *
         */
    }

    /**
     * 
     * @param type $form_options
     * @param array $html_options
     * @return type
     */
    public static function end_form($form_options = array(), $html_options = array()) {
        $output = "</form>";
        return $output;
    }

}
