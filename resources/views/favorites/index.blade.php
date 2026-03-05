@extends('layouts.app')

@section('content')
<style>
    .favorites-page {
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        min-height: 100vh;
        padding: 3rem 2rem;
    }

    .favorites-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .favorites-header {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.08);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .favorites-header h1 {
        margin: 0;
        font-size: 2rem;
        font-weight: 900;
        color: #1E3A8A;
    }

    .favorites-header p {
        margin: 0.4rem 0 0 0;
        color: #64748B;
        font-weight: 500;
    }

    .favorites-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 2rem;
    }

    .favorite-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #E0E7FF;
        transition: all 0.3s ease;
    }

    .favorite-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        border-color: #2563EB;
    }

    .favorite-cover {
        width: 100%;
        height: 240px;
        background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
    }

    .favorite-cover .icon {
        width: 3rem;
        height: 3rem;
    }

    .favorite-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .favorite-body {
        padding: 1.25rem;
    }

    .favorite-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 0.4rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .favorite-author {
        font-size: 0.9rem;
        color: #64748B;
        margin-bottom: 0.6rem;
    }

    .favorite-category {
        display: inline-block;
        background: #2563EB;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .favorite-rating {
        font-size: 0.9rem;
        color: #FBBF24;
        font-weight: 600;
        margin: 0.5rem 0 0.75rem;
    }

    .favorite-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.6rem;
    }

    .btn-small {
        padding: 0.6rem 0.5rem;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.85rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
    }

    .btn-primary-small {
        background: #2563EB;
        color: white;
    }

    .btn-primary-small:hover {
        background: #1D4ED8;
    }

    .btn-outline-small {
        background: white;
        color: #2563EB;
        border: 2px solid #2563EB;
    }

    .btn-outline-small:hover {
        background: #EFF6FF;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
        border: 2px dashed #BFDBFE;
    }

    .empty-state h3 {
        color: #1E3A8A;
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #64748B;
        margin-bottom: 1.5rem;
    }
</style>

<div class="favorites-page">
    <div class="favorites-content">
        <div class="favorites-header">
            <div>
                <h1><x-icon name="heart" class="icon-inline" />Favorit Saya</h1>
                <p>Daftar buku yang kamu tandai sebagai favorit.</p>
            </div>
        </div>

        @if($books->count() > 0)
            <div class="favorites-grid">
                @foreach($books as $book)
                    @php
                        $avgRating = $book->ratings->avg('rating') ?? 0;
                        $ratingCount = $book->ratings_count ?? 0;
                    @endphp
                    <div class="favorite-card">
                        <div class="favorite-cover">
                            @if(isset($book->cover_image))
                                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
                            @else
                                <x-icon name="book-open" />
                            @endif
                        </div>
                        <div class="favorite-body">
                            <span class="favorite-category">{{ $book->category->name ?? 'General' }}</span>
                            <h3 class="favorite-title">{{ $book->title }}</h3>
                            <p class="favorite-author">{{ $book->author }}</p>
                            <p class="favorite-rating">
                                <x-icon name="star" class="icon-inline" />{{ number_format($avgRating, 1) }}
                                @if($ratingCount > 0)
                                    ({{ $ratingCount }})
                                @else
                                    (belum ada)
                                @endif
                            </p>
                            <div class="favorite-actions">
                                <a href="{{ route('books.show', $book->id) }}" class="btn-small btn-outline-small"><x-icon name="eye" class="icon-inline" />Detail</a>
                                @if($book->copies > 0)
                                    <a href="{{ route('books.show', $book->id) }}" class="btn-small btn-primary-small"><x-icon name="book" class="icon-inline" />Pinjam</a>
                                @else
                                    <button class="btn-small btn-primary-small" style="opacity:0.5; cursor:not-allowed;" disabled><x-icon name="book" class="icon-inline" />Habis</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($books->hasPages())
                <div style="margin-top: 2rem;">
                    {{ $books->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <h3>Belum Ada Favorit</h3>
                <p>Tambahkan buku favorit dari halaman detail buku.</p>
                <a href="{{ route('books.index') }}" class="btn-small btn-primary-small" style="display:inline-flex;"><x-icon name="book" class="icon-inline" />Lihat Koleksi</a>
            </div>
        @endif
    </div>
</div>
@endsection
