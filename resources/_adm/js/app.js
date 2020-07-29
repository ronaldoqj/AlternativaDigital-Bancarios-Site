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
Vue.component('acordos-e-convencoes-page', require('./_pages/acordos-e-convencoes/AcordosEConvencoes.vue').default);
Vue.component('acordos-e-convencoes-cadastro-page', require('./_pages/acordos-e-convencoes-cadastro/AcordosEConvencoesCadastro.vue').default);
Vue.component('editais-page', require('./_pages/editais/Editais.vue').default);
Vue.component('editais-cadastro-page', require('./_pages/editais-cadastro/EditaisCadastro.vue').default);
Vue.component('form-default-combobox', require('./_pages/form-default-combobox/FormDefaultCombobox.vue').default);
Vue.component('btn-action-widget-component', require('./components/widget/BtnActionComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import Login from './components/adm/LoginComponent.vue'

const app = new Vue({
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
