!function(t,e){if("object"==typeof exports&&"object"==typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var i=e();for(var o in i)("object"==typeof exports?exports:t)[o]=i[o]}}(self,(function(){return t={32075:function(t,e,i){var o,r,n;function a(t){return a="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},a(t)}n=function(){"use strict";function t(t,e){for(var i=0;i<e.length;i++){var o=e[i];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function e(t){return e=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(t){return t.__proto__||Object.getPrototypeOf(t)},e(t)}function i(t,e){return i=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},i(t,e)}function o(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}function r(t){var i=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}();return function(){var r,n=e(t);if(i){var s=e(this).constructor;r=Reflect.construct(n,arguments,s)}else r=n.apply(this,arguments);return function(t,e){if(e&&("object"===a(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return o(t)}(this,r)}}var n=function(e){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&i(t,e)}(d,e);var n,a,s,l=r(d);function d(t){var e;return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,d),(e=l.call(this,t)).fieldValidHandler=e.onFieldValid.bind(o(e)),e.fieldInvalidHandler=e.onFieldInvalid.bind(o(e)),e}return n=d,a=[{key:"install",value:function(){var t=this,e=this.core.getFields();this.startDateFieldOptions=e[this.opts.startDate.field],this.endDateFieldOptions=e[this.opts.endDate.field];var i=this.core.getFormElement();this.core.on("core.field.valid",this.fieldValidHandler).on("core.field.invalid",this.fieldInvalidHandler).addField(this.opts.startDate.field,{validators:{date:{format:this.opts.format,max:function(){return i.querySelector('[name="'.concat(t.opts.endDate.field,'"]')).value},message:this.opts.startDate.message}}}).addField(this.opts.endDate.field,{validators:{date:{format:this.opts.format,message:this.opts.endDate.message,min:function(){return i.querySelector('[name="'.concat(t.opts.startDate.field,'"]')).value}}}})}},{key:"uninstall",value:function(){this.core.removeField(this.opts.startDate.field),this.startDateFieldOptions&&this.core.addField(this.opts.startDate.field,this.startDateFieldOptions),this.core.removeField(this.opts.endDate.field),this.endDateFieldOptions&&this.core.addField(this.opts.endDate.field,this.endDateFieldOptions),this.core.off("core.field.valid",this.fieldValidHandler).off("core.field.invalid",this.fieldInvalidHandler)}},{key:"onFieldInvalid",value:function(t){switch(t){case this.opts.startDate.field:this.startDateValid=!1;break;case this.opts.endDate.field:this.endDateValid=!1}}},{key:"onFieldValid",value:function(t){switch(t){case this.opts.startDate.field:this.startDateValid=!0,!1===this.endDateValid&&this.core.revalidateField(this.opts.endDate.field);break;case this.opts.endDate.field:this.endDateValid=!0,!1===this.startDateValid&&this.core.revalidateField(this.opts.startDate.field)}}}],a&&t(n.prototype,a),s&&t(n,s),Object.defineProperty(n,"prototype",{writable:!1}),d}(FormValidation.Plugin);return n},"object"===a(e)?t.exports=n():void 0===(r="function"==typeof(o=n)?o.call(e,i,e,t):o)||(t.exports=r)}},e={},function i(o){var r=e[o];if(void 0!==r)return r.exports;var n=e[o]={exports:{}};return t[o].call(n.exports,n,n.exports,i),n.exports}(32075);var t,e}));