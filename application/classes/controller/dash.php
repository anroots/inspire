<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The dashboard controller
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Dash extends Controller_Main
{

    /**
     * Main dashboard view
     *
     * @since 1.0
     */
    public function action_index()
    {
        $this->content->categories = ORM::factory('word_category')
            ->get();
    }

} 
