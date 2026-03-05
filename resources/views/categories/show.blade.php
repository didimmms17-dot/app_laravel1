@extends('layouts.app')

@section('title', $category->name . ' - Perpusmina')

@section('content')
<style>
    .category-page-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .category-header {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 3rem;
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
        padding: 2rem;
        border-radius: 12px;
        border-left: 4px solid #2563EB;
    }

    .category-icon-large {
        font-size: 5rem;
    }

    .category-icon-large .icon {
        width: 4rem;
        height: 4rem;
    }

    .category-header-content h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: #1E3A8A;
        margin-bottom: 0.5rem;
    }

    .category-header-content p {
        color: #64748B;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .category-header-stats {
        display: flex;
        gap: 2rem;
        margin-top: 1rem;
    }

    .stat-item {
        display: flex;
        flex-direction: column;
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: 900;
        color: #2563EB;
    }

    .stat-label {
        color: #64748B;
        font-size: 0.9rem;
    }

    .books-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 2.5rem;
        margin-bottom: 3rem;
    }

    .book-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.08);
        border: 2px solid #E0E7FF;
        display: flex;
        flex-direction: column;
    }

    .book-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
        border-color: #2563EB;
    }

    .book-cover {
        width: 100%;
        height: 280px;
        background: linear-gradient(135deg, #3B82F6, #60A5FA);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3.5rem;
        font-weight: bold;
    }

    .book-cover .icon {
        width: 3rem;
        height: 3rem;
    }

    .book-info {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .book-title {
        color: #1E3A8A;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        line-height: 1.4;
        min-height: 2.8em;
    }

    .book-author {
        color: #64748B;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }

    .book-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #FBBF24;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .book-card .btn-view {
        display: block;
        text-align: center;
        padding: 0.75rem;
        background: linear-gradient(135deg, #2563EB, #1D4ED8);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        border: none;
        cursor: pointer;
    }

    .book-card .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
        border: 2px dashed #E0E7FF;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
    }

    .empty-state-icon .icon {
        width: 4rem;
        height: 4rem;
    }

    .empty-state h2 {
        color: #1E3A8A;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }

    .empty-state p {
        color: #64748B;
        margin-bottom: 1.5rem;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #2563EB;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        gap: 1rem;
    }

    @media (max-width: 768px) {
        .category-page-container {
            padding: 2rem 1rem;
        }

        .category-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .category-header-stats {
            justify-content: center;
        }

        .category-header-content h1 {
            font-size: 2rem;
        }

        .books-list {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }
</style>

<div class="category-page-container">
    <a href="{{ route('categories.index') }}" class="back-link"><x-icon name="arrow-right" class="icon-inline" style="transform: rotate(180deg);" />Kembali ke Kategori</a>

    <div class="category-header">
        <div class="category-icon-large">
            @php
                $icons = [
                    'Fiksi' => 'book-open',
                    'Romance' => 'heart',
                    'Inspirasi' => 'star',
                    'Misteri' => 'search',
                    'Biografi' => 'user',
                    'Komedi' => 'smile',
                    'Horor' => 'alert-triangle',
                    'Fantasi' => 'book-open',
                    'Sains' => 'info',
                    'Sejarah' => 'file-text',
                ];
                $icon = $icons[$category->name] ?? 'book';
            @endphp
            <x-icon name="{{ $icon }}" />
        </div>
        <div class="category-header-content">
            <h1>{{ $category->name }}</h1>
            @if($category->description)
                <p>{{ $category->description }}</p>
            @endif
            <div class="category-header-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $books->count() }}</div>
                    <div class="stat-label">Total Buku</div>
                </div>
            </div>
        </div>
    </div>

    @if($books->count() > 0)
        <div class="books-list">
            @foreach($books as $book)
                <div class="book-card">
                    @if($book->cover_image)
                        <div class="book-cover" style="background: url('{{ asset('storage/' . $book->cover_image) }}') center/cover;">
                        </div>
                    @else
                        <div class="book-cover"><x-icon name="book-open" /></div>
                    @endif
                    <div class="book-info">
                        <h2 class="book-title">{{ $book->title }}</h2>
                        <p class="book-author">{{ $book->author }}</p>
                        <div class="book-rating">
                            @php
                                $avgRating = $book->ratings->avg('rating') ?? 0;
                                $ratingCount = $book->ratings_count ?? 0;
                            @endphp
                            <x-icon name="star" class="icon-inline" />{{ number_format($avgRating, 1) }}
                            @if($ratingCount > 0)
                                ({{ $ratingCount }})
                            @else
                                (belum ada)
                            @endif
                        </div>
                        <a href="{{ route('books.show', $book->id) }}" class="btn-view">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon"><x-icon name="inbox" /></div>
            <h2>Belum Ada Buku</h2>
            <p>Kategori {{ $category->name }} belum memiliki buku. Silakan kembali ke <a href="{{ route('categories.index') }}" style="color: #2563EB; text-decoration: underline;">daftar kategori</a> atau jelajahi kategori lain.</p>
        </div>
    @endif
</div>
@endsection
