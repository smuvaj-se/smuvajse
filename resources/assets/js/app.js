
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

// update dictionary to include validation messages in Serbian
VeeValidate.Validator.updateDictionary({

'srb': {

  messages: {

    required: 'Polje je neophodno',
    alpha: 'Samo slova',
    max: 'Maksimalno 255 karaktera',
    email: 'Email nije validan',
    confirmed: 'Šifre se ne podudaraju',
    numeric: 'Samo brojevi'

  }

}

});

// switch locale to Serbian
VeeValidate.Validator.setLocale('srb');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// pages
Vue.component('landing-page', require('./components/pages/Landing.vue'));
Vue.component('reset-page', require('./components/pages/Reset.vue'));

// forms
Vue.component('register-form', require('./components/forms/Register.vue'));
Vue.component('login-form', require('./components/forms/Login.vue'));
Vue.component('email-password-form', require('./components/forms/EmailPassword.vue'));
Vue.component('reset-password-form', require('./components/forms/ResetPassword.vue'));


const app = new Vue({
    el: '#app'
});
