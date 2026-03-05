@extends('layouts.app')

@section('title', 'Kategori Buku - Perpusmina')

@section('content')
<style>
    .categories-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: #1E3A8A;
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: #64748B;
        font-size: 1.1rem;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
    }

    .category-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.08);
        border: 2px solid #E0E7FF;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15);
        border-color: #2563EB;
    }

    .category-icon {
        background: linear-gradient(135deg, #3B82F6, #60A5FA);
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
    }

    .category-icon .icon {
        width: 3.5rem;
        height: 3.5rem;
    }

    .category-info {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .category-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 0.5rem;
    }

    .category-description {
        color: #64748B;
        font-size: 0.95rem;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .category-count {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: #2563EB;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .category-link {
        display: inline-block;
        background: linear-gradient(135deg, #2563EB, #1D4ED8);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .category-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem;
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
    }

    .empty-state p {
        color: #64748B;
    }

    @media (max-width: 768px) {
        .categories-container {
            padding: 2rem 1rem;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .categories-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }
</style>

<div class="categories-container">
    <div class="page-header">
        <h1><x-icon name="book" class="icon-inline" />Kategori Buku</h1>
        <p>Jelajahi koleksi buku kami berdasarkan kategori</p>
    </div>

    @if($categories->count() > 0)
        <div class="categories-grid">
            @foreach($categories as $category)
                <div class="category-card">
                    <div class="category-icon">
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
                    <div class="category-info">
                        <h2 class="category-name">{{ $category->name }}</h2>
                        @if($category->description)
                            <p class="category-description">{{ $category->description }}</p>
                        @else
                            <p class="category-description">Koleksi buku {{ strtolower($category->name) }} yang menarik dan berkualitas</p>
                        @endif
                        <div class="category-count">
                            <x-icon name="book" class="icon-inline" />{{ $category->books_count }} Buku
                        </div>
                        <a href="{{ route('categories.show', $category->id) }}" class="category-link">
                            Lihat Semua Buku <x-icon name="arrow-right" class="icon-inline" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="categories-grid">
            <div class="empty-state">
                <div class="empty-state-icon"><x-icon name="inbox" /></div>
                <h2>Belum Ada Kategori</h2>
                <p>Kategori buku akan ditampilkan di sini setelah ditambahkan oleh admin</p>
            </div>
        </div>
    @endif
</div>
@endsection
