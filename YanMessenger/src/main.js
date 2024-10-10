import { createApp } from 'vue';
import App from './App.vue';
import axios from 'axios';

// Создаем экземпляр Axios
const axiosInstance = axios.create({
    baseURL: 'http://127.0.0.1:8000',
    timeout: 10000,
    headers: {
        'Content-Type': 'application/json',
    },
});

axios.defaults.baseURL = 'http://127.0.0.1:8000/';

// Создаем приложение Vue
const app = createApp(App);

// Добавляем axios через provide (доступно в любом компоненте через inject)
app.provide('$axios', axiosInstance);

// Монтируем приложение
app.mount('#app');