/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import CxltToastr from 'cxlt-vue2-toastr'
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'


var toastrConfigs = {
    position: 'top right',
    showDuration: 2000,
    timeOut: 9000,
    progressBar: true,

}
Vue.use(CxltToastr, toastrConfigs)
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
created(){
    Echo.channel('Chatify')
    .listen('newevent', (e) => {
        console.log(e);

      alert(e.messege);

      this.$toast.success({
        title:'login',
        message:e.messege
    })

    });


},
mounted() {
    Echo.join(`Chat`)
    .here((users) => {
      console.log(users);
    })
    .joining((user) => {
        console.log(`${user.name} join`);
    })
    .leaving((user) => {
        console.log(`${user.name} leaving`);
    });

},

});
