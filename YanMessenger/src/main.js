import axios from 'axios';
import { createApp } from 'vue';
import App from './App.vue';

// Настройка базового URL для API
axios.defaults.baseURL = 'http://127.0.0.1:8000/';  // Убедитесь, что бэкенд работает на этом адресе

// Создаем приложение Vue
const app = createApp(App);

// Предоставляем Axios в качестве зависимости для всех компонентов
app.config.globalProperties.$axios = axios;

app.mount('#app');