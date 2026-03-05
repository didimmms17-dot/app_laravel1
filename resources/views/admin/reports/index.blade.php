@extends('admin.layout')

@section('title', 'Laporan')
@section('page-title', 'Laporan Peminjaman & Pengembalian')

@section('content-admin')
<div class="card" style="margin-bottom:16px;">
    <div class="card-body" style="padding:16px;">
        <form method="GET" action="{{ route('admin.reports.index') }}" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;">
            <div>
                <label class="form-label" for="from">Dari Tanggal</label>
                <input type="date" id="from" name="from" class="form-control" value="{{ $from }}">
            </div>
            <div>
                <label class="form-label" for="to">Sampai Tanggal</label>
                <input type="date" id="to" name="to" class="form-control" value="{{ $to }}">
            </div>
            <div style="display:flex;gap:8px;">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <i class="bi bi-journal-check" style="font-size: 1.6rem; color: #2563EB;"></i>
        <div class="number">{{ $totalBorrowed }}</div>
        <div class="label">Total Laporan Peminjaman</div>
    </div>
    <div class="stat-card">
        <i class="bi bi-arrow-return-left" style="font-size: 1.6rem; color: #16a34a;"></i>
        <div class="number">{{ $totalReturned }}</div>
        <div class="label">Total Laporan Pengembalian</div>
    </div>
</div>

<div class="card" style="margin-bottom:16px;">
    <div class="card-header">
        <h5 class="mb-0">Laporan Peminjaman Buku</h5>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive" style="padding:12px;">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tiket</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowReports as $loan)
                        <tr>
                            <td>{{ ($borrowReports->currentPage() - 1) * $borrowReports->perPage() + $loop->iteration }}</td>
                            <td><code>{{ $loan->ticket_code ?? '-' }}</code></td>
                            <td>{{ $loan->user->name ?? '-' }}</td>
                            <td>{{ $loan->book->title ?? '-' }}</td>
                            <td>{{ $loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : '-' }}</td>
                            <td>{{ $loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('d M Y') : '-' }}</td>
                            <td>
                                <span class="badge @if($loan->status === 'approved') bg-info @elseif($loan->status === 'returned') bg-success @elseif($loan->status === 'rejected') bg-danger @else bg-warning text-dark @endif">
                                    {{ ucfirst($loan->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" style="padding:0 0 12px;">
            {{ $borrowReports->links() }}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Laporan Pengembalian Buku</h5>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive" style="padding:12px;">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tiket</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($returnReports as $loan)
                        <tr>
                            <td>{{ ($returnReports->currentPage() - 1) * $returnReports->perPage() + $loop->iteration }}</td>
                            <td><code>{{ $loan->ticket_code ?? '-' }}</code></td>
                            <td>{{ $loan->user->name ?? '-' }}</td>
                            <td>{{ $loan->book->title ?? '-' }}</td>
                            <td>{{ $loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d M Y') : '-' }}</td>
                            <td><span class="badge bg-success">Returned</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengembalian.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" style="padding:0 0 12px;">
            {{ $returnReports->links() }}
        </div>
    </div>
</div>
@endsection
