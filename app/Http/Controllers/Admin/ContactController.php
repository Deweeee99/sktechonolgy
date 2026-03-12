<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan halaman pengaturan kontak
    public function index()
    {
        // Ambil data kontak pertama (karena kita hanya butuh 1 baris pengaturan)
        $contact = Contact::first();
        
        // Jika tidak ada data sama sekali (lupa jalankan seeder), buat data kosong
        if (!$contact) {
            $contact = Contact::create([]); 
        }

        return view('admin.contacts.index', compact('contact'));
    }

    // Menyimpan perubahan pengaturan
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'address' => 'required',
            'map_lat' => 'required',
            'map_lng' => 'required',
        ]);

        $contact = Contact::first();
        $contact->update($request->all());

        return back()->with('success', 'Contact & Map settings updated successfully!');
    }
}