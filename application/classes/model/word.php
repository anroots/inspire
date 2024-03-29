<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Word model
 *
 * @package Inspire
 * @since 1.0
 */
class Model_Word extends Commoneer_ORM
{

    /**
     * The directory that contains dictionaries, relative to APPPATH
     */
    const DICT_DIR = 'vendor/';

    /**
     * Get the path to the current (language specific) dict file
     *
     * @since 1.2
     * @static
     * @return string|bool Path to the current dictionary file or FALSE
     */
    public static function dict_file()
    {
        $f = APPPATH . Model_Word::DICT_DIR . I18n::lang() . '/dict.txt';
        return file_exists($f) ? $f : FALSE;
    }

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
     * Gets a single, random line from a dictionary file
     *
     * The dictionary contains a list of words and is huge
     *
     * @since 1.1
     * @return string A pseudo-random line from the dictionary file
     */
    public function from_dict()
    {
        // Read the dict file
        // Path example: APPPATH/vendor/ee/dict.txt
        $dict_file = Model_Word::dict_file();
        if (!$dict_file) {
            throw new Kohana_Exception("Dictionary file ':dict' does not exist", array(':dict' => $dict_file));
        }

        // Open file for reading
        $f = fopen($dict_file, 'r');

        // Determine, which line will be the 'random' line
        $line_number = exec("wc -l $dict_file"); // Use UNIX tools to find the line count in a LARGE file
        $line_number = explode(' ',$line_number);
        $line_number = rand(1, $line_number[0]);

        // Read line by line. This should be optimized, Immensely.
        // How would one do that, ideas?
        // Todo
        $i = 0; // Current line
        while (!feof($f)) {
            $line = fgets($f);

            // We are on the 'random' line, return it
            if ($i === $line_number) {
                break;
            }
            $i++;
        }
        fclose($f);

        return trim($line);
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

        // Type set and not random
        if ($type !== NULL && $type != 1) {
            $q->where('category_id', '=', (int)$type);
        }

        return $q->find();
    }


    /**
     * Count words in a specific category (and lang)
     *
     * @since 1.0
     * @static
     * @param int $category_id
     * @param int $language_id
     * @return int Word count
     */
    public static function count_category_words($category_id, $language_id)
    {
        $q = DB::select(DB::expr('COUNT(*)'))
            ->from('words')
            ->where('language_id', '=', $language_id)
            ->where('approved', '=', 1);

        // Random category includes all words
        if ($category_id != 1) {
            $q->where('category_id', '=', $category_id);
        }

        return $q->execute()
            ->get('COUNT(*)');
    }

    /**
     * Import lines from $filename to the word database
     *
     * @since 1.1
     * @param string $filename
     * @param int $category_id
     * @return bool
     */
    public function import($filename, $category_id)
    {
        // Full path to the txt file
        $file = DOCROOT . 'import/' . $filename;

        // Sanity/security check
        if (empty($filename) || strstr($filename, '..') || !file_exists($file)) {
            return FALSE;
        }

        // Open file for reading
        $f = fopen($file, 'r');

        // Read line by line
        while (!feof($f)) {
            $line = trim(fgets($f));

            // Try loading the word from the database
            $word = ORM::factory('word', array('string' => $line));

            // Word already exists
            if ($word->loaded()) {
                continue;
            }

            // Insert new word
            if ($word->insert(array('category_id' => $category_id, 'string' => $line)) === FALSE) {
                Notify::msg('Some of the words were not imported.');
                return FALSE;
            }
        }
        return TRUE;
    }
}