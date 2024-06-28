<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; 

class ContactController extends Controller
{
    public function index()
    {
        try {
            $languages = Language::all();
            
            return view('contact.index', compact('languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'ContactController >> index >> Failed to get contact: ' . $e->getMessage()], 500);
        }
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $formattedMessage = "
        *Asset Movies*\n_{$name} try to contact asset movies team using contact us page_\n\n*Name*: $name\n*Email*: $email\n*Message*: $message";
        
        $telegramController = new TelegramMessageController();
        $telegramController->sendTelegramMessage($formattedMessage);

        return redirect()->back()->with('success', 'Message sent to Telegram successfully!');
    }
}