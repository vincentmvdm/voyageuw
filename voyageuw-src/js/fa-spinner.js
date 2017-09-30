jQuery( document ).ready(function() {
    jQuery('.ajax-loader').after("<div id='voyageuw-spinner' class='pt8'><i class='fa fa-spinner fa-spin'></i><span class='sr-only'>Loading...</span><p class='mt3 mb0'>Your message is sending! Is it taking too long? Try sending it to voyage@uw.edu.</p></div>");

    // Show new spinner on Send button click
    jQuery('.wpcf7-submit').on('click', function () {
        jQuery('#voyageuw-spinner').css('display', 'block');
    });

    // Hide new spinner on result
    jQuery('div.wpcf7').on('wpcf7:invalid wpcf7:spam wpcf7:mailsent wpcf7:mailfailed', function () {
        jQuery('#voyageuw-spinner').css('display', 'none');
    });
});6
