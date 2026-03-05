@extends('layouts.app')

@section('content')
<div style="max-width:600px;margin:2rem auto">
    <div style="text-align:center;margin-bottom:2rem">
        <div style="width:80px;height:80px;margin:0 auto 1rem;background:linear-gradient(135deg, var(--purple-600), var(--blue-600));border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:2.5rem;box-shadow:0 12px 30px rgba(168,85,247,0.25)">
            ✏️
        </div>
        <h2 style="margin:0;color:var(--blue-800);font-size:1.8rem;font-weight:900">Edit Buku</h2>
        <p class="muted" style="margin:0.5rem 0 0">Perbarui informasi buku {{ $book->title }}</p>
    </div>

    <div class="auth-card">
        @if($errors->any())
            <div style="background:rgba(220,38,38,0.1);color:#991b1b;border:1px solid rgba(220,38,38,0.3);padding:0.75rem 1rem;border-radius:8px;margin-bottom:1rem;font-weight:600">
                ⚠️ {{ $errors->first() }}
            </div>
        @endif
        <form method="POST" action="{{ route('books.update', $book) }}">
            @csrf
            @method('PUT')
            <div class="form-control">
                <label>📕 Judul Buku</label>
                <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="Masukkan judul buku" required>
            </div>
            <div class="form-control">
                <label>✍️ Penulis</label>
                <input type="text" name="author" value="{{ old('author', $book->author) }}" placeholder="Nama penulis" required>
            </div>
            <div class="form-control">
                <label>🏷️ Kategori</label>
                <select name="category_id" style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(37,99,235,0.15); border-radius:10px; transition: all 0.3s ease;">
                    <option value="">Pilih kategori</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" @selected($book->category_id === $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label>📝 Deskripsi</label>
                <textarea name="description" rows="4" placeholder="Deskripsi buku..." style="width:100%; padding:0.8rem 1rem; border:1px solid rgba(37,99,235,0.15); border-radius:10px; transition: all 0.3s ease; font-family: inherit">{{ old('description', $book->description) }}</textarea>
            </div>
            <div class="form-control">
                <label>📚 Stok (Jumlah Buku)</label>
                <input type="number" name="copies" value="{{ old('copies', $book->copies) }}" placeholder="1" min="1" required>
            </div>
            <div style="display:flex;gap:1rem;align-items:center;margin-top:1.5rem">
                <button class="btn btn-primary" type="submit" style="flex:1;text-align:center">✅ Perbarui</button>
                <a href="{{ route('books.show', $book) }}" class="btn btn-outline" style="flex:1;text-align:center">❌ Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
