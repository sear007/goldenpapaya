(function ($) {
    wp.customize.bind('ready', () => {
        wp.customize('slider_number_control', (setting) => {
            setting.bind((newValue) => {
                // Trigger a refresh of the Customizer preview
                wp.customize.previewer.refresh();
            });
        });
    });
})(jQuery);