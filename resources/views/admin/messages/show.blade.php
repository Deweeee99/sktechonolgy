@extends('adminlte::page')
@section('title', 'Read Message')
@section('content_header')
    <h1>Read Message</h1>
@stop
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Message from <b>{{ $message->name }}</b></h3>
            <div class="card-tools">
                <a href="{{ url('admin/messages') }}" class="btn btn-sm btn-default"><i class="fas fa-arrow-left"></i> Back to Inbox</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>Subject: New Website Inquiry</h5>
                <h6>From: {{ $message->email }}
                  <span class="mailbox-read-time float-right">{{ $message->created_at->format('d M Y, H:i') }}</span>
                </h6>
            </div>
            <div class="mailbox-read-message" style="padding: 20px;">
                {!! nl2br(e($message->content)) !!}
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ url('admin/messages/'.$message->id) }}" method="POST" class="float-right">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this message?')"><i class="fas fa-trash-alt"></i> Delete</button>
            </form>
            <a href="mailto:{{ $message->email }}" class="btn btn-primary"><i class="fas fa-reply"></i> Reply via Email</a>
        </div>
    </div>
@stop