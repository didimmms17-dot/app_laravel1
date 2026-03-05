@extends('admin.layout')

@section('title', 'Notifications - Admin')
@section('page-title', 'Notifications')

@section('content-admin')
@php($isAdmin = auth()->user()->role === 'admin')
<div class="row mb-4">
    <div class="col-md-8">
        <h5>All Notifications from Borrowers</h5>
    </div>
    <div class="col-md-4 text-end">
        @if($isAdmin && \App\Models\Notification::count() > 0)
            <form action="{{ route('admin.notifications.clear') }}" method="POST" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Clear all notifications?')">
                    <i class="bi bi-trash"></i> Clear All
                </button>
            </form>
        @endif
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>From</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notifications as $notif)
                    <tr class="@if(!$notif->isRead()) table-light @endif">
                        <td>
                            <strong>{{ $notif->user->name }}</strong><br>
                            <small class="text-muted">{{ $notif->user->email }}</small>
                        </td>
                        <td>
                            <span class="badge @if($notif->type === 'loan_request') bg-info
                                                 @elseif($notif->type === 'loan_approved') bg-success
                                                 @elseif($notif->type === 'loan_rejected') bg-danger
                                                 @else bg-secondary @endif">
                                {{ str_replace('_', ' ', ucfirst($notif->type)) }}
                            </span>
                        </td>
                        <td><strong>{{ $notif->title }}</strong></td>
                        <td>{{ Str::limit($notif->message, 50) }}</td>
                        <td>{{ $notif->created_at->format('d M Y H:i') }}</td>
                        <td>
                            @if($notif->isRead())
                                <span class="badge bg-success">Read</span>
                            @else
                                <span class="badge bg-warning">Unread</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.notifications.show', $notif) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            @if($isAdmin)
                                <form action="{{ route('admin.notifications.delete', $notif) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <p class="text-muted mb-0">No notifications yet</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $notifications->links() }}
</div>
@endsection
