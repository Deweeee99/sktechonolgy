<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    // Menampilkan form edit berdasarkan slug (misal: 'company-overview')
    public function edit($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('admin.pages.edit', compact('page'));
    }

    // Menyimpan perubahan konten
    public function update(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Untuk Background
            'galleries.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Untuk Slider
        ]);

        $page = Page::where('slug', $slug)->firstOrFail();
        $page->content = $request->content;
        $page->save();

        // 1. Simpan Background Image (Tipe: 'background')
        if ($request->hasFile('image')) {
            // Cek apakah halaman ini sudah punya background di tabel gallery
            $bgGallery = PageGallery::where('page_id', $page->id)->where('type', 'background')->first();
            
            if ($bgGallery) {
                // Hapus file lama jika ada dan bukan bawaan template
                if (!str_starts_with($bgGallery->image, 'images/')) {
                    Storage::disk('public')->delete($bgGallery->image);
                }
                // Update file baru
                $bgGallery->update([
                    'image' => $request->file('image')->store('pages/background', 'public')
                ]);
            } else {
                // Buat baru jika belum ada
                PageGallery::create([
                    'page_id' => $page->id,
                    'type' => 'background',
                    'image' => $request->file('image')->store('pages/background', 'public')
                ]);
            }
        }

        // 2. Simpan Multiple Image (Tipe: 'slider')
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $path = $file->store('pages/gallery', 'public');
                PageGallery::create([
                    'page_id' => $page->id,
                    'type' => 'slider', // Set tipe ke slider
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Content updated successfully!');
    }

    // Fungsi baru untuk menghapus 1 foto dari gallery (berlaku untuk background & slider)
    public function deleteGallery($id)
    {
        $gallery = PageGallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return back()->with('success', 'Image removed successfully!');
    }
}