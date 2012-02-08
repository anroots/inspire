<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Template helper
 *
 * @package Inspire
 * @since 1.0
 */
class Helper_Template
{

    /**
     * Get a list of .txt files inside DOCROOT/import/
     *
     * @since 1.1
     * @static
     * @return array An array of .txt filenames
     */
    public static function get_txt_files()
    {

        // Scan the import dir for files
        $dir = DOCROOT . 'import';
        $contents = scandir($dir);

        $files = array();

        // If any files are found...
        if (!empty($contents)) {
            foreach ($contents as $file) {

                // The current file is Unix pseudo-dir
                if ($file == '..' || $file == '.') {
                    continue;
                }

                // Add .txt files to the $files array
                if (substr($file, -3) == 'txt') {
                    $files[] = $file;
                }
            }
        }
        return $files;
    }

    public static function lang_btn($lang)
    {
        return HTML::anchor(Request::current()->controller() . '/lang/' . $lang, '<span class="icon-flag"></span>' . strtoupper($lang), array(
            'class' => 'btn' . (I18n::lang() == $lang ? ' btn-primary' : NULL)
        ));
    }

    /**
     * Returns an array of translated word categories
     *
     * Used to generate a dropdown with the HTML form helper
     *
     * @since 1.0
     * @static
     * @return array Word statuses array, id => name
     */
    public static function word_categories()
    {
        // Get all categories
        $c = ORM::factory('word_category')
            ->where('id', '!=', 1) // Not random
            ->get()
            ->as_array('id', 'name');

        $categories = array();

        // Translate each category
        if (count($c)) {
            foreach ($c as $id => $val) {
                $categories[$id] = __($val);
            }
        }
        return $categories;
    }
}