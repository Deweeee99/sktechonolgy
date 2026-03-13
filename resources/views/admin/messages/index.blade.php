@extends('adminlte::page')
@section('title', 'Inbox Messages')
@section('content_header')
    <h1>Inbox Messages</h1>
@stop
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Sender Name</th>
                        <th>Email</th>
                        <th>Date Received</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr style="{{ !$msg->is_read ? 'font-weight: bold; background-color: #f4f6f9;' : '' }}">
                        <td>
                            @if($msg->is_read)
                                <span class="badge badge-success">Read</span>
                            @else
                                <span class="badge badge-danger">Unread</span>
                            @endif
                        </td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ $msg->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <form action="{{ url('admin/messages/'.$msg->id) }}" method="POST">
                                <a href="{{ url('admin/messages/'.$msg->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</a>
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No messages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop