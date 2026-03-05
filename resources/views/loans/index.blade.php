@extends('layouts.app')

@section('content')
<div style="margin-bottom:1.75rem">
    <h1 style="margin:0;color:var(--blue-900);font-size:2.2rem;font-weight:900"><x-icon name="clipboard" class="icon-inline" />Daftar Peminjaman</h1>
    <p class="muted" style="margin:0.5rem 0 0;color:var(--blue-700)">Kelola dan pantau semua peminjaman buku Anda</p>
</div>

@if($loans->count() > 0)
    <div class="grid" style="grid-template-columns:repeat(auto-fit, minmax(300px,1fr))">
        @foreach($loans as $loan)
            <div class="info-card">
                <div style="display:flex;align-items:start;justify-content:space-between;gap:1rem;margin-bottom:1.25rem">
                    <h3 style="margin:0;flex:1;color:var(--blue-900);font-size:1.15rem;font-weight:900"><x-icon name="book" class="icon-inline" />{{ $loan->book->title }}</h3>
                    @php
                        $statusColor = match($loan->status) {
                            'pending' => 'background:linear-gradient(135deg, rgba(245,158,11,0.15), rgba(217,119,6,0.1));color:#92400e;border:2px solid rgba(245,158,11,0.3)',
                            'approved' => 'background:linear-gradient(135deg, rgba(2,132,199,0.2), rgba(2,132,199,0.1));color:#075985;border:2px solid rgba(2,132,199,0.4)',
                            'returned' => 'background:linear-gradient(135deg, rgba(34,197,94,0.15), rgba(22,163,74,0.1));color:#15803d;border:2px solid rgba(34,197,94,0.3)',
                            default => 'background:linear-gradient(135deg, rgba(100,116,139,0.15), rgba(71,85,105,0.1));color:#1e293b;border:2px solid rgba(100,116,139,0.3)'
                        };
                    @endphp
                    <span style="padding:0.5rem 1rem;border-radius:10px;font-size:0.85rem;font-weight:900;white-space:nowrap;{{ $statusColor }}">
                        @match($loan->status)
                            @case('pending')
                                ⏳ Menunggu
                            @break
                            @case('approved')
                                ✅ Disetujui
                            @break
                            @case('returned')
                                ✔️ Dikembalikan
                            @break
                            @default
                                {{ ucfirst($loan->status) }}
                        @endmatch
                    </span>
                </div>
                
                <p class="muted" style="margin:0.75rem 0;font-size:0.95rem;color:var(--blue-700)"><x-icon name="user" class="icon-inline" />Peminjam: <strong style="color:var(--blue-900)">{{ $loan->user->name }}</strong></p>
                <p class="muted" style="margin:0.75rem 0;font-size:0.95rem;color:var(--blue-700)"><x-icon name="calendar" class="icon-inline" />Tanggal: <strong style="color:var(--blue-900)">{{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}</strong></p>
                @if($loan->return_date)
                    <p class="muted" style="margin:0.75rem 0;font-size:0.95rem;color:var(--blue-700)"><x-icon name="rotate-cw" class="icon-inline" />Kembali: <strong style="color:var(--blue-900)">{{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}</strong></p>
                @endif
                <p class="muted" style="margin:0.75rem 0 1.5rem;font-size:0.9rem;color:var(--blue-700)"><x-icon name="book-open" class="icon-inline" />{{ $loan->book->author }}</p>

                @if(auth()->user()->role === 'user' && in_array($loan->status, ['approved', 'returned']))
                    <div style="margin-bottom:1rem">
                        <a href="{{ route('loans.ticket', $loan) }}" class="btn btn-outline" style="width:100%;padding:0.7rem;text-align:center;display:inline-flex;justify-content:center;align-items:center;gap:0.4rem;">
                            <x-icon name="book-open" class="icon-inline" />Lihat / Cetak Tiket
                        </a>
                    </div>
                @endif

                @if(auth()->user()->role === 'petugas' || auth()->user()->role === 'admin')
                    <div style="display:flex;gap:0.75rem;flex-wrap:wrap">
                        @if($loan->status === 'pending')
                            <form method="POST" action="{{ route('loans.approve', $loan) }}" style="flex:1">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="width:100%;padding:0.75rem;font-size:0.9rem;text-align:center">✅ Setujui</button>
                            </form>
                        @endif
                        @if($loan->status === 'approved')
                            <form method="POST" action="{{ route('loans.return', $loan) }}" style="flex:1">
                                @csrf
                                <button type="submit" class="btn btn-outline" style="width:100%;padding:0.75rem;font-size:0.9rem;text-align:center"><x-icon name="rotate-cw" class="icon-inline" />Terima Kembali</button>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div style="margin-top:2.5rem">
        {{ $loans->links() }}
    </div>
@else
    <div class="info-card" style="text-align:center;padding:2.5rem">
        <p style="font-size:3.5rem;margin:0"><x-icon name="inbox" /></p>
        <h3 style="color:var(--blue-900);margin:1rem 0;font-weight:900">Tidak Ada Peminjaman</h3>
        <p class="muted" style="color:var(--blue-700)">Anda belum meminjam buku apapun. <a href="{{ route('books.index') }}" style="color:var(--blue-600);font-weight:900;text-decoration:none">Jelajahi koleksi kami sekarang →</a></p>
    </div>
@endif

@endsection
