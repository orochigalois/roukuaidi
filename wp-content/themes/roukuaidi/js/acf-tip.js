jQuery(function () {
    jQuery(document).on("click", "[data-name='add-layout']", function () {

        jQuery(".acf-fc-popup>ul>li").hover(function () {
            if (0 == jQuery(this).find('span').length) {
                jQuery(this).append('<span><img width="700" src="'+_imagedir+'/instruction/'+jQuery(this).find('a').data('layout')+'.png" alt=""></span>');
            }

        });
    });

});