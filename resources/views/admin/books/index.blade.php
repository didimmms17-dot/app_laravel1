@extends('admin.layout')

@section('title', 'Kelola Buku')
@section('page-title', 'Kelola Buku')

@section('content-admin')
@php($isAdmin = auth()->user()->role === 'admin')

@if($isAdmin)
<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Buku Baru
        </a>
    </div>
</div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Daftar Buku ({{ $books->total() }} buku)</h5>
    </div>
    <div class="card-body">
        @if($books->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada buku.@if($isAdmin) <a href="{{ route('admin.books.create') }}">Tambah buku baru</a>@endif
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>ISBN</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Ditambahkan</th>
                            @if($isAdmin)<th>Aksi</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $index => $book)
                            <tr>
                                <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                                <td>
                                    @if($book->cover_image_url)
                                        <img src="{{ $book->cover_image_url }}" alt="Cover {{ $book->title }}"
                                             style="width:55px;height:75px;object-fit:cover;border-radius:6px;border:1px solid #ddd;"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div style="display:none;width:55px;height:75px;border-radius:6px;background:#e2e8f0;color:#64748b;align-items:center;justify-content:center;font-size:11px;">No Cover</div>
                                    @else
                                        <div style="width:55px;height:75px;border-radius:6px;background:#e2e8f0;color:#64748b;display:flex;align-items:center;justify-content:center;font-size:11px;">No Cover</div>
                                    @endif
                                </td>
                                <td><strong>{{ $book->title }}</strong></td>
                                <td>{{ $book->author }}</td>
                                <td><code>{{ $book->isbn }}</code></td>
                                <td>
                                    @if($book->category)
                                        <span class="badge bg-info">{{ $book->category->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge @if($book->copies > 0) bg-success @else bg-danger @endif">
                                        {{ $book->copies }} 
                                    </span>
                                </td>
                                <td>{{ $book->created_at->format('d M Y') }}</td>
                                @if($isAdmin)
                                    <td>
                                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $books->links('vendor.pagination.custom') }}
            </div>
        @endif
    </div>
</div>

<style>
    .btn { padding: 6px 12px; font-size: 13px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; border: none; }
    .btn-primary { background: #007bff; color: white; }
    .btn-primary:hover { background: #0056b3; }
    .btn-warning { background: #ffc107; color: black; }
    .btn-warning:hover { background: #ff9800; }
    .btn-danger { background: #dc3545; color: white; }
    .btn-danger:hover { background: #c82333; }
    .btn-sm { padding: 4px 8px; font-size: 12px; }
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .badge.bg-success { background: #28a745 !important; color: white; }
    .badge.bg-danger { background: #dc3545 !important; color: white; }
    .badge.bg-info { background: #17a2b8 !important; color: white; }
    .badge.bg-secondary { background: #6c757d !important; color: white; }
    .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; }
    .card-header { background: white; border-bottom: 1px solid #ddd; padding: 16px; }
    .card-body { padding: 0; }
    .table { width: 100%; border-collapse: collapse; margin-bottom: 0; }
    .table th { background: #f5f5f5; font-weight: 600; border-bottom: 2px solid #ddd; padding: 12px; text-align: left; }
    .table td { padding: 12px; border-bottom: 1px solid #ddd; }
    .table tr:hover { background: #f9f9f9; }
    .table-responsive { padding: 12px; }
    .alert { padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
    .text-center { text-align: center; }
    .d-flex { display: flex; }
    .justify-content-center { justify-content: center; }
    .mt-4 { margin-top: 24px; }
</style>
@endsection
