jQuery(document).ready(function($) {
    // Image selection
    var frame;

    $('#room-gallery-add-images').on('click', function(e) {
        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({
            title: 'Select Images',
            multiple: true,
            library: {
                type: 'image',
            },
            button: {
                text: 'Select',
            },
        });

        frame.on('select', function() {
            var selection = frame.state().get('selection');
            var imageIds = [];

            selection.each(function(attachment) {
                imageIds.push(attachment.attributes.id);
            });

            $('#room-gallery-images').val(imageIds.join(','));
            previewImages(imageIds);
        });

        frame.open();
    });

    // Image preview
    function previewImages(imageIds) {
        var previewContainer = $('.room-gallery-preview');
        previewContainer.empty();

        if (imageIds.length > 0) {
            $.each(imageIds, function(index, imageId) {
                var attachment = wp.media.attachment(imageId);
                attachment.fetch();
                var thumbUrl = attachment.attributes.sizes.thumbnail.url;
                var listItem = $('<li><img src="' + thumbUrl + '"></li>');
                previewContainer.append(listItem);
            });
        }
    };
});