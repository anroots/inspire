<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The admin controller
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Admin extends Controller_Main
{

    public function before()
    {
        $this->_login_url = 'auth';
        parent::before();
    }

    public function action_index()
    {
    }

} 
