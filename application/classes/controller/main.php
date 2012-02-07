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
    }

    /**
     * Switch language
     *
     * @since 1.0
     */
    public function action_lang()
    {
        // Store language change
        if (in_array($this->id, Kohana::$config->load('app.langs'))) {
            Session::instance()->set('lang', $this->id);
        }

        // Redirect
        $this->request->redirect($this->request->controller());
    }
}
