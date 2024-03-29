/**
 * Javascript file for the main dashboard
 */

/**
 * Current category id
 *
 * This is changed when category tabs are opened/closed
 * and is passed to the API
 *
 * @since 1.0
 */
var category_id = 1;

/**
 * Returns a new inspiration of type _type_
 *
 * @since 1.0
 * @param int category One of the defined category IDs
 * @return string Inspiration word
 */
function inspire(category) {
    var word = $.i18n._('Aww! The server exploded!');

    if (!category) {
        category = '';
    }

    $.ajax({
        type:'GET',
        async:false,
        url:base_url + 'word/inspire/' + category,
        data:{
            use_dictionary:$('#use-dictionary').is(':checked') ? 1 : 0
        },
        success:function (json) {
            if (json && json.status == 200) {
                word = json.response;
            }
        }
    });

    // The word is UTF8-encoded
    return decodeURIComponent(word);
}

/**
 * Change the current word
 *
 * @since 1.0
 * @return void
 */
function re_inspire() {
    // Replace word box with loading bar
    $('#the-word').hide().html('...').fadeIn(100);

    // Fetch the word
    var word = inspire(category_id);

    // Display the word
    $('#the-word').hide().html(word).fadeIn(1000);
}

// Ready
$(document).ready(function () {

    // Redirect to the minimal view if the browser doesn't support AJAX
    if (!jQuery.support.ajax) {
        window.location.href = base_url + 'dash/minimal';
    }

    // Get new word on first load
    re_inspire();

    // Btn for getting a new word
    $('#btn-inspire').click(function () {

        // About tab active, switch to first category
        if ($('.yellow.active').length) {
            $('.nav-tabs a[href="#tab-1"]').tab('show');
        }
        re_inspire();
    });

    // Tooltips on about tab
    $('.tooltips a[rel="tooltip"]').tooltip();

    // On tab switch
    $('a[data-toggle="tab"]').on('shown', function (e) {

        // Split the DOM tab ID
        var id = $(e.target).attr('href');
        id = id.substr(1, id.length).split('-');
        id = id[1];

        // Save category change (to be posted to the API)
        category_id = id;


        // Workaround to show nonexisting tab container

        var new_id = $(e.target).attr('href'); // The ID of the new tab

        // If tab is about (the start) and next tab is not tab-1, load tab-1 content and switch to the new tab
        if ($(e.relatedTarget).attr('href') == '#tab-about' && $(e.target).attr('href') != '#tab-1') {
            $('.nav-tabs a[href="#tab-1"]').tab('show');
            $('.nav-tabs a[href="' + new_id + '"]').tab('show');
        }


        // Ask for a new word
        re_inspire();
    });

});
