require('./bootstrap');

window.Vue = require('vue');

Vue.component('my-link-component', require('./components/MyLinkComponent.vue').default);
Vue.component('link-component', require('./components/LinkComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);

const app = new Vue({
    el: '#app',
});
