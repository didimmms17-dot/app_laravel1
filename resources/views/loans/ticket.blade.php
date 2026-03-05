@extends('layouts.app')

@section('title', 'Tiket Peminjaman')

@section('content')
@php
    $ticketPayload = json_encode([
        'ticket_code' => $loan->ticket_code,
        'loan_id' => $loan->id,
        'book' => $loan->book->title,
        'borrower' => $loan->user->name,
        'loan_date' => $loan->loan_date,
        'due_date' => $loan->due_date,
    ], JSON_UNESCAPED_UNICODE);
    $qrUrl = 'https://quickchart.io/qr?text=' . urlencode($ticketPayload) . '&size=220';
@endphp

<style>
    .ticket-page {
        background: linear-gradient(135deg, #e8f1f8 0%, #d4e4f7 100%);
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .ticket-wrap {
        max-width: 820px;
        margin: 0 auto;
    }

    .ticket-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
        margin-bottom: 1rem;
    }

    .ticket-btn {
        border: none;
        border-radius: 8px;
        padding: 0.7rem 1.1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .ticket-btn.print { background: #2563eb; color: #fff; }
    .ticket-btn.back { background: #e2e8f0; color: #1e293b; }

    .ticket-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.12);
        overflow: hidden;
        border: 1px solid #dbeafe;
    }

    .ticket-header {
        padding: 1.5rem;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: #fff;
    }

    .ticket-header h1 {
        margin: 0;
        font-size: 1.3rem;
    }

    .ticket-header p {
        margin: 0.35rem 0 0;
        opacity: 0.95;
    }

    .ticket-body {
        padding: 1.5rem;
        display: grid;
        grid-template-columns: 1fr 250px;
        gap: 1.5rem;
    }

    .ticket-row {
        margin-bottom: 0.75rem;
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 0.75rem;
    }

    .ticket-row label {
        color: #64748b;
        font-weight: 700;
    }

    .ticket-row span {
        color: #0f172a;
        font-weight: 600;
    }

    .ticket-code {
        margin: 0.5rem 0 1rem;
        background: #eff6ff;
        border: 1px dashed #3b82f6;
        color: #1e3a8a;
        border-radius: 10px;
        padding: 0.8rem 1rem;
        font-size: 1.1rem;
        font-weight: 900;
        letter-spacing: 0.08em;
        text-align: center;
    }

    .ticket-qr {
        text-align: center;
    }

    .ticket-qr img {
        width: 220px;
        height: 220px;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: #fff;
    }

    .ticket-note {
        padding: 1rem 1.5rem 1.5rem;
        color: #475569;
        font-size: 0.92rem;
    }

    @media (max-width: 768px) {
        .ticket-body { grid-template-columns: 1fr; }
        .ticket-actions { justify-content: stretch; }
        .ticket-btn { flex: 1; justify-content: center; }
        .ticket-row { grid-template-columns: 1fr; }
    }

    @media print {
        body * { visibility: hidden; }
        .ticket-card, .ticket-card * { visibility: visible; }
        .ticket-card { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; }
        .ticket-actions { display: none !important; }
        .navbar, nav, header, footer { display: none !important; }
    }
</style>

<div class="ticket-page">
    <div class="ticket-wrap">
        <div class="ticket-actions">
            <a href="{{ route('loans.history') }}" class="ticket-btn back"><x-icon name="arrow-left" class="icon-inline" />Kembali</a>
            <button type="button" class="ticket-btn print" onclick="window.print()"><x-icon name="book-open" class="icon-inline" />Cetak Tiket</button>
        </div>

        <div class="ticket-card">
            <div class="ticket-header">
                <h1><x-icon name="check-circle" class="icon-inline" />Tiket Peminjaman Buku</h1>
                <p>Bukti peminjaman resmi, simpan atau cetak tiket ini.</p>
            </div>

            <div class="ticket-body">
                <div>
                    <div class="ticket-code">{{ $loan->ticket_code }}</div>

                    <div class="ticket-row">
                        <label>Peminjam</label>
                        <span>{{ $loan->user->name }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Email</label>
                        <span>{{ $loan->user->email }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Judul Buku</label>
                        <span>{{ $loan->book->title }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Pengarang</label>
                        <span>{{ $loan->book->author }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Tanggal Disetujui</label>
                        <span>{{ $loan->approved_at ? $loan->approved_at->format('d M Y H:i') : '-' }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Tanggal Pinjam</label>
                        <span>{{ $loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : '-' }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Jatuh Tempo</label>
                        <span>{{ $loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('d M Y') : '-' }}</span>
                    </div>
                    <div class="ticket-row">
                        <label>Status</label>
                        <span>{{ ucfirst($loan->status) }}</span>
                    </div>
                </div>

                <div class="ticket-qr">
                    <img src="{{ $qrUrl }}" alt="QR Tiket {{ $loan->ticket_code }}"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <small style="display:none;color:#64748b;">QR tidak tersedia, gunakan kode tiket.</small>
                </div>
            </div>

            <div class="ticket-note">
                Tunjukkan tiket ini (kode atau QR) saat pengambilan/pengembalian buku. Tiket berlaku untuk 1 transaksi peminjaman.
            </div>
        </div>
    </div>
</div>
@endsection

