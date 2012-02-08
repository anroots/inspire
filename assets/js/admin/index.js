$(document).ready(function () {

    /**
     * Add new word click
     *
     * @since 1.0
     */
    $('#btn-add-word').click(function () {

        // Don't post empty words
        if ($('#txt-new-word').val().length == 0) {
            return;
        }

        // Post word to the API
        $.post(base_url + 'word/add', {
            string:$('#txt-new-word').val(),
            category_id:$('#select-category-id').val()
        }, function (json) {
            if (json && json.status == 200) {
                $('#txt-new-word').val('');
            } else {
                alert('The server exploded!');
            }
        });
    });
});