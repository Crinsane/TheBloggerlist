/**
 * Load the pace library and immediately start it
 */
window.pace = require('pace');
pace.start();

/**
 * Load jQuery and make global
 */
window.$ = window.jQuery = require('jquery');

/**
 * Require Moment.js
 */
window.moment = require('moment');

/**
 * Require the bootstrap JavaScript components
 */
// require('bootstrap');

/**
 * Require MetisMenu plugin
 */
require('metismenu');

/**
 * Require jQuery Slimscroll plugin
 */
require('jquery-slimscroll');

/**
 * Require Vue and make globally
 */
// window.Vue = require('vue');

/**
 * Require Vue resource and add csrf-token to http headers
 */
// Vue.use(require('vue-resource'));

// Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

/**
 * Require Bootstrap datepicker
 */
require('bootstrap-datepicker');

require('summernote');

/**
 * Require toastr and set options
 */
window.toastr = require('toastr');

toastr.options = {
    "closeButton": true,
    "debug": false,
    "progressBar": true,
    "preventDuplicates": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": 400,
    "hideDuration": 1000,
    "timeOut": 7000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
