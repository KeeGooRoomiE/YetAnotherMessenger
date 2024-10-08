import Vue from 'vue';
import App from './App.vue';
import axios from 'axios';


const axiosInstance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api', 
    timeout: 10000,  
    headers: {
        'Content-Type': 'application/json'
    }
});

Vue.prototype.$axios = axiosInstance;

new Vue({
    render: h => h(App),
}).$mount('#app');