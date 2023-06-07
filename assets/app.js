/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';
import './main.js'
import './bootstrap.js';
// import '../node_modules/d3/dist/d3.min.js';

const $ = require('jquery');
global.$ = global.jQuery = $;

require('bootstrap');

// start the Stimulus application
// import './bootstrap';
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});