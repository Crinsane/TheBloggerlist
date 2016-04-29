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
 * Require the bootstrap JavaScript components
 */
require('bootstrap');