(function ($) {

	"use strict";


    $('#selectAllBoxes').on('click', function(e) {
        if(this.checked) {
            $('.checkboxs').each(function() {
                this.checked = true;
            });
        }else{
            $('.checkboxs').each(function() {
                this.checked = false;
            });
        }
    });

})(jQuery);	


