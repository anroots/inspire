<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Word model
 *
 * @package Inspire
 * @since 1.0
 */
class Model_Word extends Model
{

    /**
     * Get a random word
     *
     * @since 1.0
     * @param null|string $type Word type
     * @return string A random word
     */
    public function inspire($type = NULL)
    {
        // TODO: Create ERD, move this to ORM
        $words = array('Dog', 'Cat', 'Mouse', 'Chicken');
        return $words[rand(0, 3)];
    }
}