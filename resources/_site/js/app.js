/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
window._ = require('lodash');

import vuetify from './vuetify'


// import CKEditor from 'ckeditor4-vue';
// Vue.use( CKEditor );

// import Vue from 'vue';
// import CKEditor from '@ckeditor/ckeditor5-vue';


//Vue.use( CKEditor );
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sindicalize-se-component', require('./components/SindicalizeSeComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import Login from './components/adm/LoginComponent.vue'

const vm = new Vue({
    vuetify,
    el: '#app',
    data: {
        email: '',
        emailRules: [
            v => !!v || 'E-mail é obrigatorio',
            v => /.+@.+\..+/.test(v) || 'E-mail precisa ser valido',
        ],

        show1: false,
        password: '',
        rules: {
            required: value => !!value || 'Required.',
            min: v => v.length >= 6 || 'Minimo de 6 caracteres'
        },

    }
    //render: h => h(Login),
});
