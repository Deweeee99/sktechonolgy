<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Menampilkan daftar pesan (diurutkan dari yang belum dibaca)
    public function index()
    {
        $messages = Message::orderBy('is_read', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    // Membaca isi pesan & mengubah status menjadi "Read"
    public function show($id)
    {
        $message = Message::findOrFail($id);
        
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.messages.show', compact('message'));
    }

    // Menghapus pesan
    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return back()->with('success', 'Message deleted successfully!');
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comments' => 'required|string',
        ]);

        \App\Models\Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->comments,
            'is_read' => false // Otomatis belum dibaca
        ]);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}