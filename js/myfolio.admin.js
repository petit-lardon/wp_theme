jQuery(document).ready(function($) {
    var mediaUploader;

    $('#upload-button').click(function(e) {
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
    });
});
