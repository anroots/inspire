<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Template helper
 *
 * @package Inspire
 * @since 1.0
 */
class Helper_Template
{
    public static function lang_btn($lang)
    {
        return HTML::anchor(Request::current()->controller().'/lang/'.$lang, strtoupper($lang), array(
            'class' => 'btn' . (I18n::lang() == $lang ? ' btn-primary' : NULL)
        ));
    }
}