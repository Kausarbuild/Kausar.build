/**
 * Studio Build Portfolio - Native WordPress Media Library Integration
 *
 * Powers one-click image replacement for all theme image controls in the WordPress Admin.
 */
(function($) {
    'use strict';

    $(document).ready(function() {
        // Image Selection via Native WordPress Media Library
        $(document).on('click', '.studio-media-upload-btn', function(e) {
            e.preventDefault();

            var $btn = $(this);
            var $wrapper = $btn.closest('.studio-media-field-wrapper');
            var $input = $wrapper.find('.studio-media-input');
            var $preview = $wrapper.find('.studio-media-preview');
            var $previewImg = $preview.find('img');
            var $removeBtn = $wrapper.find('.studio-media-remove-btn');
            var fieldTitle = $btn.data('title') || 'Select Image';
            var buttonText = $btn.data('button-text') || 'Use This Image';

            // Create and open wp.media modal
            var frame = wp.media({
                title: fieldTitle,
                button: {
                    text: buttonText
                },
                multiple: false,
                library: {
                    type: 'image'
                }
            });

            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                var selectedUrl = attachment.url;

                // Prefer large size if available for preview efficiency
                if (attachment.sizes && attachment.sizes.large) {
                    selectedUrl = attachment.sizes.large.url;
                } else if (attachment.sizes && attachment.sizes.full) {
                    selectedUrl = attachment.sizes.full.url;
                }

                // Update hidden input
                $input.val(selectedUrl).trigger('change');

                // Update visual preview image
                if ($previewImg.length) {
                    $previewImg.attr('src', selectedUrl);
                } else {
                    $preview.html('<img src="' + selectedUrl + '" alt="Selected Image" />');
                }

                $preview.removeClass('is-empty').show();
                $removeBtn.show();
            });

            frame.open();
        });

        // Reset to Default / Remove Image
        $(document).on('click', '.studio-media-remove-btn', function(e) {
            e.preventDefault();

            var $btn = $(this);
            var $wrapper = $btn.closest('.studio-media-field-wrapper');
            var $input = $wrapper.find('.studio-media-input');
            var $preview = $wrapper.find('.studio-media-preview');
            var $previewImg = $preview.find('img');
            var defaultUrl = $btn.data('default') || '';

            $input.val(defaultUrl).trigger('change');

            if (defaultUrl) {
                if ($previewImg.length) {
                    $previewImg.attr('src', defaultUrl);
                } else {
                    $preview.html('<img src="' + defaultUrl + '" alt="Default Image" />');
                }
                $preview.removeClass('is-empty').show();
            } else {
                $preview.empty().addClass('is-empty');
                $btn.hide();
            }
        });
    });
})(jQuery);
