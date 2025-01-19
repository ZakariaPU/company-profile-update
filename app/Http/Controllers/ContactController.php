<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Simpan data ke database
        $message = Message::create($validated);

        // Kirim notifikasi email
        Mail::to('zakariapryutm@example.com')->send(new ContactNotification($validated));

        return response()->json(['message' => 'Message sent and email notification delivered successfully']);
            }
}
