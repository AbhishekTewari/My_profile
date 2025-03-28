(function($) {
    "use strict";

    $(document).ready(function() {
        $('a[aria-current="page"]').parent('li').addClass('active');
    });

})(jQuery);