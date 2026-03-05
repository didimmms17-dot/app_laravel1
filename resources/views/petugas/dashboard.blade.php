@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Petugas</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Notifikasi Peminjaman</div>
                <div class="card-body">
                    @foreach($loanRequests as $loan)
                        <div class="mb-3 p-2 border rounded">
                            <strong>{{ $loan->user->name }}</strong> mengajukan peminjaman buku <strong>{{ $loan->book->title }}</strong> <br>
                            <span>Status: <span class="badge bg-warning text-dark">{{ $loan->status }}</span></span>
                            <form method="POST" action="{{ route('petugas.loans.confirm', $loan->id) }}" class="mt-2">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Notifikasi Pengembalian</div>
                <div class="card-body">
                    @foreach($returnRequests as $loan)
                        <div class="mb-3 p-2 border rounded">
                            <strong>{{ $loan->user->name }}</strong> mengembalikan buku <strong>{{ $loan->book->title }}</strong> <br>
                            <span>Status: <span class="badge bg-info text-dark">{{ $loan->status }}</span></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
