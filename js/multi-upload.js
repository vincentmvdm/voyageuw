function addFileInput(){var e=jQuery(".file-wrap");e[counter].style.display="flex",counter++,counter===e.length&&jQuery("#addFileInputWrapper").remove()}var counter=0;jQuery(function(){var e=jQuery("input[type='file']");e.css("display","none"),e.wrap("<label class='btn label-file'>Browse </label>"),jQuery(".label-file").each(function(e,r){jQuery("<input id='file-status-"+e+"' placeholder='No file selected' disabled>").insertBefore(jQuery(this))});var r=jQuery(".label-file");e.each(function(e,r){jQuery(this).change(function(){jQuery("#file-status-"+e).attr("placeholder",jQuery(this).val())})});for(var l=0;l<r.length;l++)jQuery(".wpcf7-form-control-wrap.your-file-"+(l+1)).wrapInner("<div class='file-wrap'></div>");for(var a=jQuery(".file-wrap"),l=1;l<a.length;l++)a[l].style.display="none";jQuery("<div class='mt3' id='addFileInputWrapper'><span id='addFileInput' onclick='addFileInput()'>Add another file</span></div>").insertAfter(a[a.length-1]),counter++});