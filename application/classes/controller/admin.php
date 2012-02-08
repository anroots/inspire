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

    /**
     * Main admin page
     *
     * @since 1.0
     */
    public function action_index()
    {
        $this->content->languages = ORM::factory('language')
            ->get();

        $this->content->categories = ORM::factory('word_category')
            ->get();

        $this->content->files = Helper_Template::get_txt_files();
    }

    /**
     * Import words from txt files
     *
     * @since 1.1
     */
    public function action_import()
    {
        if (Auth::instance()->logged_in('admin') &&
            ORM::factory('word')->import($this->request->post('file'), $this->request->post('category_id'))
        ) {

            Notify::msg('File imported.', 'success');
        } else {
            Notify::msg('The file was not imported.', 'error');
        }

        $this->request->redirect('admin');
    }

} 
