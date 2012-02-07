<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The API controller for requesting new words
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Word extends Controller_Main
{

    /**
     * Get inspired
     *
     * Param ID is word category
     * Returns JSON
     *
     * @since 1.0
     */
    public function action_inspire()
    {
        $w = Model::factory('word');

        $this->respond(Controller_Ajax::STATUS_OK, $w->inspire($this->id));
    }

} 
