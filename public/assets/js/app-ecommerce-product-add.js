"use strict";!function(){const e=document.querySelector(".comment-editor");e&&new Quill(e,{modules:{toolbar:".comment-toolbar"},placeholder:"Product Description",theme:"snow"});const r=document.querySelector("#dropzone-basic");if(r){new Dropzone(r,{previewTemplate:'<div class="dz-preview dz-file-preview">\n<div class="dz-details">\n  <div class="dz-thumbnail">\n    <img data-dz-thumbnail>\n    <span class="dz-nopreview">No preview</span>\n    <div class="dz-success-mark"></div>\n    <div class="dz-error-mark"></div>\n    <div class="dz-error-message"><span data-dz-errormessage></span></div>\n    <div class="progress">\n      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>\n    </div>\n  </div>\n  <div class="dz-filename" data-dz-name></div>\n  <div class="dz-size" data-dz-size></div>\n</div>\n</div>',parallelUploads:1,maxFilesize:5,acceptedFiles:".jpg,.jpeg,.png,.gif",addRemoveLinks:!0,maxFiles:1})}const a=document.querySelector("#ecommerce-product-tags"),t=(new Tagify(a),new Date),s=document.querySelector(".product-date");s&&s.flatpickr({monthSelectorType:"static",defaultDate:t})}(),$((function(){var e=$(".select2");e.length&&e.each((function(){var e=$(this);e.wrap('<div class="position-relative"></div>').select2({dropdownParent:e.parent(),placeholder:e.data("placeholder")})}));var r=$(".form-repeater");if(r.length){var a=2,t=1;r.on("submit",(function(e){e.preventDefault()})),r.repeater({show:function(){var e=$(this).find(".form-control, .form-select"),r=$(this).find(".form-label");e.each((function(s){var o="form-repeater-"+a+"-"+t;$(e[s]).attr("id",o),$(r[s]).attr("for",o),t++})),a++,$(this).slideDown(),$(".select2-container").remove(),$(".select2.form-select").select2({placeholder:"Placeholder text"}),$(".select2-container").css("width","100%"),$(".form-repeater:first .form-select").select2({placeholder:"Placeholder text"})}})}}));
