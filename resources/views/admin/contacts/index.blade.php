@extends('adminlte::page')

@section('title', 'Contact & Map Settings')

@section('content_header')
    <h1>Contact & Map Settings</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('admin/contacts') }}" method="POST">
        @csrf
        
        <div class="row">
            <!-- Kolom Kiri: Info Kontak & Sosial Media -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header"><h3 class="card-title">Contact Details</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Physical Address</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ $contact->address }}</textarea>
                        </div>

                        <hr>
                        <h5>Social Media Links</h5>
                        <div class="form-group">
                            <label>Facebook URL</label>
                            <input type="text" name="facebook" class="form-control" value="{{ $contact->facebook }}">
                        </div>
                        <div class="form-group">
                            <label>Instagram URL</label>
                            <input type="text" name="instagram" class="form-control" value="{{ $contact->instagram }}">
                        </div>
                        <div class="form-group">
                            <label>Twitter URL</label>
                            <input type="text" name="twitter" class="form-control" value="{{ $contact->twitter }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Peta (Map) -->
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header"><h3 class="card-title">Map Coordinates (Leaflet/Google Maps)</h3></div>
                    <div class="card-body">
                        <p class="text-muted"><small>Enter the exact Latitude and Longitude to point your office location on the map.</small></p>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="map_lat" class="form-control" value="{{ $contact->map_lat }}" placeholder="-8.556" required>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="map_lng" class="form-control" value="{{ $contact->map_lng }}" placeholder="125.560" required>
                        </div>
                        <div class="form-group">
                            <label>Map Popup Text</label>
                            <input type="text" name="map_popup" class="form-control" value="{{ $contact->map_popup }}" placeholder="SK Technology Dili, Timor Leste.">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-save"></i> Save All Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop