import {createApp} from 'vue';
import App from './App.vue';
import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://127.0.0.1:8000',
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json'
    }
});

const app = createApp(App);

app.provide('$axios', axiosInstance);

app.mount('#app');