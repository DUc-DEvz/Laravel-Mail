@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Thông báo của bạn</h3>
        <a href="{{ route('notifications.readAll') }}" class="btn btn-success mb-3">Đánh dấu tất cả là đã đọc</a>
        <ul class="list-group">
            @foreach (auth()->user()->notifications as $notification)
                <li
                    class="list-group-item d-flex justify-content-between align-items-center 
                {{ $notification->read_at ? 'bg-light' : 'bg-warning' }}">
                    {{ $notification->data['message'] }}
                    <div>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        @if (!$notification->read_at)
                            <a href="{{ route('notifications.read', $notification->id) }}" class="btn btn-sm btn-primary">Đánh
                                dấu là đã đọc</a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
