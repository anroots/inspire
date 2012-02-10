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
     * Get inspired (return a random word)
     *
     * Param ID is word category, accepts optional GET use_dictionary param
     * Returns JSON
     *
     * @since 1.0
     * @ajax
     */
    public function action_inspire()
    {
        // Take random word from the dictionary?
        $dict = (bool)$this->request->query('use_dictionary');

        if ($dict) { // Read dictionary file
            $data = $this->_w->from_dict();
        } else { // Ask the database
            $data = $this->_w->inspire($this->id)->string;
        }

        // Respond with a random word (utf8 encoded)
        $this->respond(Controller_Ajax::STATUS_OK, utf8_encode(trim($data)));
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
