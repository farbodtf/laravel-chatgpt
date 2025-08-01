<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class chatGptIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id = \null): Response
    {
        // return Inertia::render('Chat/ChatIndex');

        return Inertia::render('Chat/ChatIndex',[
            'chat' => $id ? Chat::findOrFail($id) : null,
            'messages' => Chat::latest()->where('user_id' , Auth::id())->get(),
        ]);
    }
}
