<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    // Menampilkan daftar slider
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    // Menyimpan slider baru
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'big_text' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image' => $imagePath,
            'small_text_top' => $request->small_text_top,
            'big_text' => $request->big_text,
            'small_text_bottom' => $request->small_text_bottom,
        ]);

        return back()->with('success', 'Slider added successfully!');
    }
    // ... (kode index dan store sebelumnya biarkan saja) ...

    // Menampilkan form edit
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    // Menyimpan perubahan (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // nullable karena gambar tidak wajib diganti
            'big_text' => 'required|string|max:255',
        ]);

        $slider = Slider::findOrFail($id);

        // Jika user mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada (kecuali gambar bawaan dari folder 'images/')
            if (!str_starts_with($slider->image, 'images/')) {
                Storage::disk('public')->delete($slider->image);
            }
            
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('sliders', 'public');
            $slider->image = $imagePath;
        }

        // Update data teks
        $slider->small_text_top = $request->small_text_top;
        $slider->big_text = $request->big_text;
        $slider->small_text_bottom = $request->small_text_bottom;
        $slider->save();

        return redirect('admin/sliders')->with('success', 'Slider updated successfully!');
    }


    // Menghapus slider
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('public')->delete($slider->image); // Hapus file gambar
        $slider->delete();

        return back()->with('success', 'Slider deleted successfully!');
    }
}