<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Word model
 *
 * @package Inspire
 * @since 1.0
 */
class Model_Word extends Commoneer_ORM
{

    public function rules()
    {
        return array(
            'string' => array(
                array('max_length', array(':value', 255)),
                array('not_empty')
            ),
            'category_id' => array(
                array('not_empty'),
                array('digit')
            ),
            'language_id' => array(
                array('not_empty'),
                array('digit')
            ),
        );
    }

    /**
     * Insert a new word to the database
     *
     * @since 1.0
     * @param array $data An assoc array of (POST) data
     * @return mixed FALSE on failure
     */
    public function insert(array $data)
    {
        if (!isset($data['language_id'])) {
            $data['language_id'] = ORM::factory('language', array('code' => I18n::lang()))->id;
        }

        // Load model with values
        $this->values($data, array('string', 'category_id', 'language_id'));

        // When admin adds a row, the word is automatically approved
        if (Auth::instance()->logged_in('admin')) {
            $this->approved = 1;
            $user = Auth::instance()->get_user();
            $this->approver_id = $user->id;
        }

        // Try saving
        try {
            return $this->save();
        } catch (ORM_Validation_Exception $e) {

        } catch (Database_Exception $e) {

        }
        return FALSE;
    }

    /**
     * Get a random word
     *
     * @since 1.0
     * @param null|string $type Word type
     * @return string A random word
     */
    public function inspire($type = NULL)
    {
        if ($this->loaded()) {
            $this->clear();
        }

        $q = $this->select()
            ->order_by(DB::expr('rand()'))
            ->where('approved', '=', '1')
            ->where('language_id', '=', ORM::factory('language', array('code' => I18n::lang())));

        if ($type !== NULL) {
            $q->where('type_id', '=', (int)$type);
        }

        return $q->find();
    }
}