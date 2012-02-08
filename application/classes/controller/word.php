<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The API controller for requesting new words
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Word extends Controller_Main
{
    protected $_w;

    public function before()
    {
        $this->_w = Model::factory('word');
        parent::before();
    }

    /**
     * Get inspired
     *
     * Param ID is word category
     * Returns JSON
     *
     * @since 1.0
     * @ajax
     */
    public function action_inspire()
    {
        $this->respond(Controller_Ajax::STATUS_OK, $this->_w->inspire($this->id)->string);
    }

    /**
     * Add a new word
     *
     * @since 1.0
     * @ajax
     */
    public function action_add()
    {
        if ($this->_w->insert($this->request->post()) !== FALSE) {
            $this->respond(Controller_Ajax::STATUS_OK);
        }
        $this->respond(Controller_Ajax::STATUS_ERROR);
    }
} 
