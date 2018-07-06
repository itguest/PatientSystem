
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {
    $,
    jQuery
} from 'jquery';
// export for others scripts to use
window.$ = $;
window.jQuery = jQuery;
require('./bootstrap');
window.Vue = require('vue');
if (typeof jQuery === "undefined") {
    throw new Error("AdminLTE requires jQuery");
}
var AdminLTEOptions;
(function ($, jQuery, AdminLTEOptions) {
    //// original code goes here
})(jQuery, jQuery, AdminLTEOptions);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
