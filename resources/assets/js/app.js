
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import Router from './routes.js'

window.vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('blogs', require('./components/Blogs.vue'));
Vue.component('aboutus', require('./components/Aboutus.vue'));
Vue.component('cat', require('./components/cat.vue'));
Vue.component('categories', require('./components/Categories.vue'));
Vue.component('contact', require('./components/Contact.vue'));
Vue.component('description', require('./components/Description.vue'));
Vue.component('gen', require('./components/gen.vue'));
Vue.component('home', require('./components/Home.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('signup', require('./components/Signup.vue'));
Vue.component('userblogs', require('./components/Userblogs.vue'));


const app = new Vue({
    el: '#app',
    router: Router
});
