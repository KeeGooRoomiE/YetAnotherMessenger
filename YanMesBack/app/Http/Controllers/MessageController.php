<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;  // Подключаем модель Message
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    // Отправка сообщения
    public function sendMessage(Request $request)
    {
        $request->validate([
            'sender_pseudonym' => 'required|string|max:255',
            'receiver_pseudonym' => 'required|string|max:255',
            'content' => 'nullable|string|max:500',
            'expiration_time' => 'required|integer',
            'file' => 'nullable|file|mimes:jpg,png,pdf|max:2048'  // Валидация файла
        ]);

        // Сохраняем сообщение в базе данных
        $message = new Message();
        $message->sender_pseudonym = $request->sender_pseudonym;
        $message->receiver_pseudonym = $request->receiver_pseudonym;
        $message->content = $request->content;

        // Обработка загрузки файла
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            $message->file_path = $filePath;
        }

        // Установка времени удаления
        $message->expiration_time = now()->addMinutes($request->expiration_time);
        $message->save();

        return response()->json(['success' => true, 'message' => 'Message sent']);
    }

    // Получение сообщений для пользователя
    public function getMessages($pseudonym)
    {
        // Получение сообщений для указанного псевдонима
        $messages = Message::where('receiver_pseudonym', $pseudonym)
            ->where('expiration_time', '>', now())
            ->orderBy('created_at', 'desc')
            ->paginate(10);  // Пагинация по 10 сообщений

        return response()->json($messages);
    }
}
