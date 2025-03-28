(function($) {
    "use strict";

    $(document).ready(function() {
        $('input[name="your-name"], input[name="your-subject"]').on("input", function(event) {
            // Allow only alphabets a-z and A-Z
            $(this).val($(this).val().replace(/[^a-zA-Z\s]/g, ''));
        });

        $('textarea[name="your-message"]').on("input", function(event) {
            // Allow only alphabets a-z and A-Z
            $(this).val($(this).val().replace(/[^a-zA-Z\s.,]/g, ''));
        });
    });

})(jQuery);