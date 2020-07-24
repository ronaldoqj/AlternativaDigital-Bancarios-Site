/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window._ = require('lodash');

import vuetify from './vuetify'
import CKEditor from 'ckeditor4-vue';
Vue.use( CKEditor );

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Componentes do template
Vue.component('header-component', require('./components/_template/HeaderComponent.vue').default);
Vue.component('sidebar-menu-component', require('./components/_template/SidebarmenuComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('errors-component', require('./components/widget/ErrorsComponent.vue').default);
Vue.component('login-component', require('./components/widget/LoginComponent.vue').default);
Vue.component('noticias-cadastro-page', require('./_pages/noticias-cadastro/NoticiasCadastro.vue').default);
Vue.component('noticias-page', require('./_pages/noticias/Noticias.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import Login from './components/adm/LoginComponent.vue'

const app = new Vue({
    vuetify,
    el: '#app',
    //render: h => h(Login),
});
