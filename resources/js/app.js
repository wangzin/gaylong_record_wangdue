require('./bootstrap');

import { createApp } from "vue";
import axios from 'axios'
import router from './router'
import dashboard from './components/Dashboard.vue'
// import VueNextSelect from 'vue-next-select'
import Toaster from "@meforma/vue-toaster";

import { Form, HasError, AlertError } from 'vform';
window.form = Form;

import moment from 'moment';
window.moment = moment;

const app = createApp({});
app.config.globalProperties.$axios = axios;
window.Swal =  app.config.globalProperties.$swal;
app.use(router);
app.use(Toaster, {
position: "top-right",
});
app.component('dashboard', dashboard);
// app.component('vue-select', VueNextSelect)

app.config.errorHandler = (err) => {
    alert(err);
};
app.mixin({
    mounted(){
        //for data tabel pagination
    },
    methods: {
        remove_error(field_id){
            if($('#'+field_id).val()!=""){
                $('#'+field_id).removeClass('is-invalid');
                $('#'+field_id+'_error').html('');
            }
        },
    }
});
app.mount('#app');


