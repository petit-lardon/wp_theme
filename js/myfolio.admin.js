jQuery(document).ready(function($) {
    var mediaUploader;

    $('#upload-button').on('click', function(e) {
        e.preventDefault();

        if(mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Profile picture',
            button: {
                text: 'Choose a picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-preview').css('background-image', 'url('+attachment.url+')');

        });

        mediaUploader.open();
    });

    $('#remove-picture').on('click', function(e) {
        e.preventDefault();

        var answer = confirm("Remove profile picture ?");

        if(answer == true) {

            $('#profile-picture').val('');
            $('.myfolio__form').submit()
        }
        return;
    });
});
