@extends('adminlte::page')

@section('title', 'Edit Service')

@section('content_header')
    <h1>Edit Service</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header"><h3 class="card-title">Update Service Information</h3></div>
                
                <form action="{{ url('admin/services/'.$service->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="card-body">
                        <div class="form-group">
                            <label>Order Number</label>
                            <input type="text" name="order_number" class="form-control" value="{{ $service->order_number }}">
                        </div>
                        <div class="form-group">
                            <label>Icon Class (FontAwesome)</label>
                            <input type="text" name="icon" class="form-control" value="{{ $service->icon }}">
                        </div>
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <a href="{{ url('admin/services') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-warning float-right">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop