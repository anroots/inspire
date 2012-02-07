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

    if (!type) {
        type = '';
    }

    $.ajax({
        type:'GET',
        async:false,
        url:base_url + 'word/inspire/' + type,
        success:function (json) {
            if (json && json.status == 200) {
                word = json.response;
            }
        }
    });
    return word;
}

/**
 * Change the current word
 *
 * @since 1.0
 * @return void
 */
function re_inspire() {
    $('#the-word').hide().html(inspire()).fadeIn(1000);
}

// Ready
$(document).ready(function () {

    // Set translation
    $.i18n.setDictionary(dictionary_eng);

    // Get new word on first load
    re_inspire();

    // Btn for getting a new word
    $('#btn-inspire').click(function () {
        $('.nav-tabs a:first').tab('show');
        re_inspire();
    });

    // Tooltips on about tab
    $('.tooltips a[rel="tooltip"]').tooltip();

    // On tab switch
    $('a[data-toggle="tab"]').on('shown', function (e) {
        var id = $(e.target).attr('href');
        id = id.substr(1, id.length);

        if (id != 'tab-random' && id != 'tab-about') {
            $('#modal-still-in-dev').modal('show');
        }
    });

    // Close dev modal
    $('#btn-close-dev-modal').click(function () {
        $('#modal-still-in-dev').modal('hide');
    });
});

// Translations
var dictionary_eng = {
    'Aww! The server exploded!':'Aww! The server exploded!'
}