/**
 * Javascript file for the main dashboard
 */

/**
 * Returns a new inspiration of type _type_
 *
 * @since 1.0
 * @param string type One of the defined types (sentence, location etc)
 * @return string Inspiration word
 */
function inspire(type) {
    var word = $.i18n._('Aww! The server exploded!');

    $.ajax({
        type:'GET',
        async:false,
        url:base_url + '',
        data:{
            type:type
        },
        success:function (json, status) {
            console.debug(json);
            console.debug(status);
        }
    });
    return word;
}


// Ready
$(document).ready(function () {


    $.i18n.setDictionary(dictionary_eng);

    $('#the-word').html(inspire());

});

// Translations
var dictionary_eng = {
    'Aww! The server exploded!':'Aww! The server exploded!'
}