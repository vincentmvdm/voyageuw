var counter = 0;

jQuery(function() {
    var fileInputs = jQuery("input[type='file']");
    fileInputs.css("display", "none");
    fileInputs.wrap("<label class='btn label-file'>Browse </label>");
    jQuery('.label-file').each(function(i, obj) {
        jQuery( "<input id='file-status-" + i + "' placeholder='No file selected' disabled>" ).insertBefore(jQuery(this));
    });
    var fileLabels = jQuery('.label-file');


    fileInputs.each(function(i, obj) {
        jQuery(this).change(function() {
            jQuery( '#file-status-' + i ).attr("placeholder", jQuery(this).val());
        });
    });
    for (var i = 0; i < fileLabels.length; i++) {
        jQuery(".wpcf7-form-control-wrap.your-file-" + (i + 1)).wrapInner("<div class='file-wrap'></div>");
    }
    var fileWraps = jQuery('.file-wrap');
    for (var i = 1; i < fileWraps.length; i++) {
        fileWraps[i].style.display = "none";
    }
    jQuery( "<div class='mt3' id='addFileInputWrapper'><span id='addFileInput' onclick='addFileInput()'>Add another file</span></div>" ).insertAfter( fileWraps[fileWraps.length - 1] );
    counter++;
});

function addFileInput() {
    var fileWraps = jQuery('.file-wrap');
    fileWraps[counter].style.display = "flex";

    counter++;
    if (counter === fileWraps.length) {
        jQuery( "#addFileInputWrapper" ).remove();
    }
}
