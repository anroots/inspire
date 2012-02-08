/**
 * I18n translation file: client side
 *
 * @since 1.0
 */
$(document).ready(function () {

    // Set translation
    if (current_lang == 'ee') {
        $.i18n.setDictionary(dictionary_ee);
    }
});

// Translations
var dictionary_ee = {
    'Aww! The server exploded!':'Oops! Server karjub appi.'
}