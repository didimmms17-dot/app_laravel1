@extends('admin.layout')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')
@section('additional-styles')
@parent
<style>
    .dashboard-stats-row {
        display: grid;
        grid-template-columns: repeat(4, minmax(180px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .dashboard-stats-row .stat-card {
        min-width: 0;
    }

    @media (max-width: 992px) {
        .dashboard-stats-row {
            grid-template-columns: repeat(2, minmax(180px, 1fr));
        }
    }

    @media (max-width: 576px) {
        .dashboard-stats-row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content-admin')
@php($isAdmin = auth()->user()->role === 'admin')
<div class="dashboard-stats-row stretch-cards">
    <div class="stat-card">
        <i class="bi bi-people-fill" style="font-size: 22px; color: #3498db;"></i>
        <div class="number">{{ $totalUsers }}</div>
        <div class="label">Total Users</div>
    </div>
    <div class="stat-card">
        <i class="bi bi-book-fill" style="font-size: 22px; color: #27ae60;"></i>
        <div class="number">{{ $totalBooks }}</div>
        <div class="label">Total Books</div>
    </div>
    <div class="stat-card">
        <i class="bi bi-arrow-left-right" style="font-size: 22px; color: #f39c12;"></i>
        <div class="number">{{ $totalLoans }}</div>
        <div class="label">Total Loans</div>
    </div>
    <div class="stat-card">
        <i class="bi bi-bell-fill" style="font-size: 22px; color: #e74c3c;"></i>
        <div class="number">{{ $unreadNotifications }}</div>
        <div class="label">Unread Notifications</div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Active Loans</h5>
            </div>
            <div class="card-body">
                <div style="font-size: 48px; font-weight: bold; color: #3498db; text-align: center;">
                    {{ $activeLoans }}
                </div>
                <p style="text-align: center; color: #7f8c8d; margin-top: 10px;">
                    Loans currently active and need follow-up
                </p>
                <a href="{{ route('admin.loans.index') }}" class="btn btn-primary w-100">
                    <i class="bi bi-arrow-right"></i> View All Loans
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                @if($isAdmin)
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-outline-primary w-100 mb-2">
                        <i class="bi bi-person-plus-fill"></i> Add New Staff
                    </a>
                    <a href="{{ route('admin.books.create') }}" class="btn btn-outline-primary w-100 mb-2">
                        <i class="bi bi-book-plus"></i> Add New Book
                    </a>
                @endif
                <a href="{{ route('admin.notifications') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-bell"></i> View Notifications
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

