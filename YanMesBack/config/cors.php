<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],  // Определяем пути, к которым применяются правила CORS

    'allowed_methods' => ['*'],  // Разрешаем все HTTP методы (GET, POST, PUT и т.д.)

    'allowed_origins' => ['*'],  // Разрешаем запросы с любых источников (если хотите ограничить, укажите конкретные домены, например, 'http://localhost:5173')

    'allowed_origins_patterns' => [],  // Массив паттернов для фильтрации источников, если требуется

    'allowed_headers' => ['*'],  // Разрешаем все заголовки (например, Authorization, Content-Type и т.д.)

    'exposed_headers' => [],  // Укажите заголовки, которые могут быть доступны в ответе на клиенте

    'max_age' => 0,  // Указываем максимальный срок кэширования предварительных запросов

    'supports_credentials' => false,  // Если вы хотите поддерживать запросы с куками (например, аутентификация), установите true
];
