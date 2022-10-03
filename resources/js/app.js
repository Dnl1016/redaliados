/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import JQuery from 'jquery'
window.$ = JQuery
window.app_domail = 'http://localhost/redaliados/public';
import { createApp } from 'vue';
// import App from './App.vue'
import PersonalAccessTokens from './components/PersonalAccessTokens.vue';
// app.component('example-component', ExampleComponent);

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});


// import ExampleComponent from './components/ExampleComponent.vue';
// 

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
// app.component(
// 	'passport-personal-access-tokens',
// 	require('./components/PersonalAccessTokens.vue'));
//app.component('passport-personal-access-tokens', {'./components/PersonalAccessTokens.vue': any})
app.component('passport-personal-access-tokens', PersonalAccessTokens);

// app.component(
// 	'passport-clients',
// 	require('./components/Clients.vue'));

// app.component(
// 	'passport-authorized-clients',
// 	require('./components/AuthorizedClients.vue'));

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
