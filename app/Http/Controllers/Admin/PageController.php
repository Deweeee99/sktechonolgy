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
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'galleries.*' => 'image|mimes:jpeg,png,jpg|max:2048' // Validasi untuk multiple image
        ]);

        $page = Page::where('slug', $slug)->firstOrFail();
        $page->content = $request->content;

        // 1. Update Background Image Utama (Kode sebelumnya)
        if ($request->hasFile('image')) {
            if ($page->image && !str_starts_with($page->image, 'images/')) {
                Storage::disk('public')->delete($page->image);
            }
            $page->image = $request->file('image')->store('pages', 'public');
        }

        $page->save();

        // 2. Simpan Multiple Image ke Tabel PageGallery
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $path = $file->store('pages/gallery', 'public');
                PageGallery::create([
                    'page_id' => $page->id,
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Content updated successfully!');
    }

    // Fungsi baru untuk menghapus 1 foto dari gallery
    public function deleteGallery($id)
    {
        $gallery = PageGallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return back()->with('success', 'Image removed from gallery!');
    }
}