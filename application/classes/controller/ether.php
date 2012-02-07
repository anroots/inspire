<?php defined('SYSPATH') or die('No direct script access.');

/**
 * The API controller for requesting new words
 *
 * @package Controller
 * @since 1.0
 */
class Controller_Ether extends Controller_Main
{

    public function action_inspire()
    {
        $words = array('Goat', 'Man', 'Spring', 'Bark', 'Sitting', 'Lunch');
        $this->respond(Controller_Ajax::STATUS_OK, $words[rand(0, 4)]);
    }

} 
