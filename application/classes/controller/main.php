<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The main (ajax capable) controller for the app
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Main extends Commoneer_Controller_Ajax
{
    public function before()
    {
        // Switch language
        $lang = Session::instance()->get('lang');
        if (!empty($lang)) {
            I18n::lang($lang);
        }

        parent::before();

        // Get all languages
        View::set_global('langs', ORM::factory('language')
            ->get()
            ->as_array('id', 'code'));
    }

    /**
     * Switch language
     *
     * @since 1.0
     */
    public function action_lang()
    {
        // Store language change
        $l = ORM::factory('language', array('code' => $this->id));
        if ($l->loaded()) {
            Session::instance()->set('lang', $this->id);
        }

        // Redirect
        $this->request->redirect($this->request->controller());
    }
}
