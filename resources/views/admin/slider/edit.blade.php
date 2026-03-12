@extends('adminlte::page')

@section('title', 'Edit Slider')

@section('content_header')
    <h1>Edit Slider</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header"><h3 class="card-title">Update Slider Information</h3></div>
                
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Wajib ditambahkan untuk proses Update -->
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label>Background Image</label>
                            <input type="file" name="image" class="form-control" id="imageInput">
                            <small class="text-muted">Leave blank if you don't want to change the image.</small>
                            
                            @php
                                $currentImage = str_starts_with($slider->image, 'images/') ? asset($slider->image) : asset('storage/' . $slider->image);
                            @endphp
                            
                            <!-- Menampilkan gambar yang saat ini tersimpan / Preview baru -->
                            <img id="imagePreview" src="{{ $currentImage }}" alt="Current Image" style="display: block; width: 100%; margin-top: 10px; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group">
                            <label>Top Small Text</label>
                            <input type="text" name="small_text_top" class="form-control" value="{{ $slider->small_text_top }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Main Big Text</label>
                            <input type="text" name="big_text" class="form-control" value="{{ $slider->big_text }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Bottom Description</label>
                            <textarea name="small_text_bottom" class="form-control" rows="3">{{ $slider->small_text_bottom }}</textarea>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <a href="{{ url('admin/sliders') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-warning float-right">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    // Script untuk mengganti preview gambar lama dengan gambar baru yang dipilih
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@stop