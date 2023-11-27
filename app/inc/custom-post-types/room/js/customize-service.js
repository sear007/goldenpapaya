(function ($) {
    wp.customize.bind('ready', function() {
        // Retrieve the array data from the setting
        var dataArray = wp.customize('service_free_wifi_title').get().split('\n');
        console.log(dataArray)
        // Loop through the array data and create settings and controls dynamically
        dataArray.forEach(function (data, index) {
            var dataParts = data.split(',');
    
            // Add Title Setting
            wp.customize('free_wifi_title_setting_' + index, function (setting) {
                setting.set(dataParts[0]); // Set the default value
            });
    
            // Add Title Control
            wp.customize.control('free_wifi_title_control_' + index, function (control) {
                control.setting = 'free_wifi_title_setting_' + index;
            });
    
            // Add Description Setting
            wp.customize('free_wifi_description_setting_' + index, function (setting) {
                setting.set(dataParts[1]); // Set the default value
            });
    
            // Add Description Control
            wp.customize.control('free_wifi_description_control_' + index, function (control) {
                control.setting = 'free_wifi_description_setting_' + index;
            });
        });
    });
})(jQuery);