@extends('adminlte::page')

@section('title', 'Home Sliders')

@section('content_header')
    <h1>Home Sliders Management</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Form Add Slider -->
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header"><h3 class="card-title">Add New Slider</h3></div>
                <form action="{{ url('admin/sliders') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Background Image</label>
                            <input type="file" name="image" class="form-control" id="imageInput" required>
                            <!-- Tempat munculnya preview gambar -->
                            <img id="imagePreview" src="" alt="Image Preview" style="display: none; width: 100%; margin-top: 10px; border-radius: 5px;">
                        </div>
                        <div class="form-group">
                            <label>Top Small Text</label>
                            <input type="text" name="small_text_top" class="form-control" placeholder="e.g. SK Technology">
                        </div>
                        <div class="form-group">
                            <label>Main Big Text</label>
                            <input type="text" name="big_text" class="form-control" placeholder="e.g. Secure IT Solutions" required>
                        </div>
                        <div class="form-group">
                            <label>Bottom Description</label>
                            <textarea name="small_text_bottom" class="form-control" rows="3" placeholder="Enter description here..."></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Slider</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- List Sliders -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Active Sliders</h3></div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Big Text</th>
                                <th style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                @php
                                    $bgImage = str_starts_with($slider->image, 'images/') ? asset($slider->image) : asset('storage/' . $slider->image);
                                @endphp
                                <td><img src="{{ $bgImage }}" width="100" style="border-radius: 5px;" alt="Slider Image"></td>
                                <td>{{ $slider->big_text }}</td>
                                <td>
                                    <!-- Tombol Edit & Delete bersebelahan -->
                                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST">
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    // Script untuk memunculkan preview gambar saat file dipilih
    document.getElementById('imageInput').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>
@stop