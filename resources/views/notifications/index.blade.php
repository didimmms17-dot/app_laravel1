@extends('layouts.app')

@section('title', 'Notifikasi Saya')

@section('content')
<div style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:1rem;">
        <h1 style="margin:0;color:#1e3a8a;">Notifikasi</h1>
        @if($notifications->whereNull('read_at')->count() > 0)
            <form method="POST" action="{{ route('notifications.read-all') }}">
                @csrf
                <button type="submit" style="padding:0.55rem 0.9rem;border:none;border-radius:8px;background:#2563eb;color:#fff;font-weight:700;cursor:pointer;">
                    Tandai Semua Dibaca
                </button>
            </form>
        @endif
    </div>

    @if(session('status'))
        <div style="margin-bottom:1rem;padding:0.75rem 1rem;border-radius:8px;background:#dcfce7;color:#166534;">
            {{ session('status') }}
        </div>
    @endif

    @forelse($notifications as $notification)
        <div style="background:#fff;border:1px solid #dbeafe;border-left:5px solid {{ $notification->read_at ? '#93c5fd' : '#2563eb' }};border-radius:10px;padding:1rem;margin-bottom:0.75rem;">
            <div style="display:flex;justify-content:space-between;gap:1rem;align-items:flex-start;flex-wrap:wrap;">
                <div>
                    <h3 style="margin:0 0 0.25rem 0;color:#1e3a8a;">{{ $notification->title }}</h3>
                    <p style="margin:0 0 0.35rem 0;color:#334155;">{{ $notification->message }}</p>
                    <small style="color:#64748b;">{{ $notification->created_at->format('d M Y H:i') }}</small>
                </div>
                @if(!$notification->read_at)
                    <form method="POST" action="{{ route('notifications.read', $notification) }}">
                        @csrf
                        <button type="submit" style="padding:0.45rem 0.75rem;border:none;border-radius:8px;background:#0ea5e9;color:#fff;font-weight:600;cursor:pointer;">
                            Tandai Dibaca
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        <div style="padding:1rem;border-radius:10px;background:#eff6ff;color:#1e40af;">
            Belum ada notifikasi peminjaman.
        </div>
    @endforelse

    <div style="margin-top:1rem;">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
