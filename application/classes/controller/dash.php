<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The dashboard controller
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Dash extends Controller_Main
{
    protected $_w;

    public function before()
    {
        if (strstr(Request::current()->uri(),'minimal')) {
            $this->template = 'templates/minimal';
        }
        parent::before();
        $this->_w = Model::factory('word');
    }

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

    /**
     * Minimal dash view for light clients: old mobile browsers
     *
     * @since 1.2
     */
    public function action_minimal()
    {
        $this->content->categories = ORM::factory('word_category')
            ->get();

        $this->content->word = (bool)$this->request->query('use_dictionary')
            ? $this->_w->from_dict()
            : $this->_w->inspire($this->request->query('category_id'))->string;
    }
}