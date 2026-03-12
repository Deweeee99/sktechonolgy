@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Admin</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>Selamat datang di Admin Panel pertama Anda!</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Halaman admin dimuat!'); </script>
@stop