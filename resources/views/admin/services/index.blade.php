@extends('adminlte::page')

@section('title', 'Manage Services')

@section('content_header')
    <h1>Services (What We Do Grid)</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Form Add -->
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header"><h3 class="card-title">Add New Service</h3></div>
                <form action="{{ url('admin/services') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Order Number</label>
                            <input type="text" name="order_number" class="form-control" placeholder="e.g. 07.">
                        </div>
                        <div class="form-group">
                            <label>Icon Class (FontAwesome)</label>
                            <input type="text" name="icon" class="form-control" placeholder="e.g. fal fa-desktop">
                        </div>
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Service</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- List Services -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Services List</h3></div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->order_number }}</td>
                                <td><i class="{{ $service->icon }} fa-2x"></i><br><small>{{ $service->icon }}</small></td>
                                <td><b>{{ $service->title }}</b><br>{{ $service->description }}</td>
                                <td>
                                    <form action="{{ url('admin/services/'.$service->id) }}" method="POST">
                                        <a href="{{ url('admin/services/'.$service->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                        
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