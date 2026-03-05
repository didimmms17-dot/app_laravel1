@extends('admin.layout')

@section('title', 'Notification Details - Admin')
@section('page-title', 'Notification Details')

@section('content-admin')
@php($isAdmin = auth()->user()->role === 'admin')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-2">{{ $notification->title }}</h5>
                        <span class="badge @if($notification->type === 'loan_request') bg-info
                                             @elseif($notification->type === 'loan_approved') bg-success
                                             @elseif($notification->type === 'loan_rejected') bg-danger
                                             @else bg-secondary @endif">
                            {{ str_replace('_', ' ', ucfirst($notification->type)) }}
                        </span>
                    </div>
                    @if($isAdmin && !$notification->isRead())
                        <form action="{{ route('admin.notifications.mark-read', $notification) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="bi bi-check-circle"></i> Mark as Read
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h6>From: <strong>{{ $notification->user->name }}</strong></h6>
                    <small class="text-muted">{{ $notification->user->email }}</small>
                </div>

                <hr>

                <div class="mb-4">
                    <h6>Message:</h6>
                    <p>{{ $notification->message }}</p>
                </div>

                @if($notification->loan)
                    <hr>
                    <div class="mb-4">
                        <h6>Related Loan:</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Book:</strong> {{ $notification->loan->book->title }}</p>
                                <p><strong>Author:</strong> {{ $notification->loan->book->author }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Status:</strong>
                                    <span class="badge @if($notification->loan->status === 'pending') bg-warning
                                                      @elseif($notification->loan->status === 'approved') bg-info
                                                      @elseif($notification->loan->status === 'returned') bg-success
                                                      @elseif($notification->loan->status === 'rejected') bg-danger
                                                      @endif">
                                        {{ ucfirst($notification->loan->status) }}
                                    </span>
                                </p>
                                <p><strong>Loan Date:</strong> {{ $notification->loan->loan_date ? \Carbon\Carbon::parse($notification->loan->loan_date)->format('d M Y') : '-' }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.loans.show', $notification->loan) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i> View Loan Details
                        </a>
                    </div>
                @endif

                <hr>

                <div class="mb-4">
                    <small class="text-muted">
                        <i class="bi bi-clock"></i> Created at: {{ $notification->created_at->format('d M Y H:i:s') }}<br>
                        @if($notification->isRead())
                            <i class="bi bi-check-circle"></i> Read at: {{ $notification->read_at->format('d M Y H:i:s') }}
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('admin.notifications') }}" class="btn btn-secondary mt-4">
    <i class="bi bi-arrow-left"></i> Back to Notifications
</a>
@endsection
