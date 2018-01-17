
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.use(Buefy);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// var app = new Vue({// here we create new Vue object, and html div id = app is property of that vue object and now we can use Buefy components
//     el: '#app',
//     data:{}
// });


//This our Jquery for implement hovering over our dropdown button menu
$(document).ready(function() {
    $('button.dropdown').hover(function(e) {// Here we are targeting dropdown button class and add to it toggleClass when we hower on it// We targeing button element and add to it
        $(this).toggleClass('is-open');// Since it is toogle, it will automaticaly toolge back closes dropdown when we hower off
    });
});

