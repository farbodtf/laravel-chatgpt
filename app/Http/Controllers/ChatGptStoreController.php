<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ChatGptStoreController extends Controller
{
    public function __invoke(Request $request, string $id = null)
    {
        $messages = [];

        if ($id) {
            $chat = Chat::findOrFail($id);
            $messages = $chat->context;
        }

        $messages[] = ['role' => 'user', 'content' => $request->input('prompt')];


        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => $messages,
        ]);


        if ($response->failed()) {
            return back()->withErrors(['error' => 'خطا در ارتباط با OpenAI']);
        }

        $assistantReply = $response->json('choices.0.message.content');
        $messages[] = ['role' => 'assistant', 'content' => $assistantReply];

        $chat = Chat::updateOrCreate([
            'id' => $id,
            'user_id' => Auth::id()
        ], [
            'context' => $messages
        ]);

        return redirect()->route('chat.show', [$chat->id]);
    }
}
