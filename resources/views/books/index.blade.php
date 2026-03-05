@extends('layouts.app')

@section('content')
<style>
    .books-page-container {
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        min-height: 100vh;
        padding: 3rem 2rem;
    }

    .books-page-content {
        max-width: 1400px;
        margin: 0 auto;
    }

    .books-page-header {
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        padding: 3rem 2rem;
        border-radius: 16px;
        margin-bottom: 3rem;
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
    }

    .books-page-header h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin: 0 0 0.5rem 0;
    }

    .books-page-header p {
        font-size: 1.1rem;
        opacity: 0.95;
        margin: 0;
    }

    .books-filters {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.08);
    }

    .books-filter {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .filter-group {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 1.5rem;
    }

    .filter-buttons {
        display: flex;
        gap: 1rem;
        grid-column: 1 / -1;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 0.75rem 1.5rem;
        border: 2px solid #E0E7FF;
        background: white;
        color: #2563EB;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: #2563EB;
        color: white;
        border-color: #2563EB;
    }

    .filter-item {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .filter-item label {
        font-weight: 700;
        color: #1E3A8A;
        font-size: 0.95rem;
    }

    .filter-item input,
    .filter-item select {
        padding: 0.75rem;
        border: 2px solid #E0E7FF;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .filter-item input:focus,
    .filter-item select:focus {
        outline: none;
        border-color: #2563EB;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .btn-filter {
        padding: 0.75rem 2rem;
        border: 2px solid #2563EB;
        background: #2563EB;
        color: white;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        background: #1D4ED8;
        border-color: #1D4ED8;
    }

    .btn-reset {
        background: white;
        color: #2563EB;
        border-color: #2563EB;
    }

    .btn-reset:hover {
        background: #EFF6FF;
    }

    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 2rem;
    }

    .book-item {
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #BFDBFE;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .book-item:focus-visible {
        outline: 3px solid #1D4ED8;
        outline-offset: 2px;
    }

    .book-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        border-color: #2563EB;
    }

    .book-cover {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        font-weight: bold;
        color: white;
    }

    .book-cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .book-details {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
    }

    .book-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 0.5rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .book-author {
        font-size: 0.85rem;
        color: #64748B;
        margin-bottom: 0.75rem;
    }

    .book-category {
        display: inline-block;
        background: #2563EB;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .book-actions {
        display: flex;
        gap: 0.6rem;
        align-items: stretch;
        justify-content: center;
        margin-top: auto;
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
        gap: 0.5rem;
        flex: 0 0 48%;
        min-height: 40px;
        white-space: nowrap;
        text-align: center;
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

    .btn-disabled-small {
        background: #E2E8F0;
        color: #64748B;
        cursor: not-allowed;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 2000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: white;
        padding: 2rem;
        border-radius: 16px;
        max-width: 500px;
        width: 90%;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .modal-header {
        font-size: 1.5rem;
        font-weight: 900;
        color: #1E3A8A;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modal-close {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #64748B;
    }

    .modal-body {
        margin-bottom: 1.5rem;
    }

    .modal-rating {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .star-btn {
        background: none;
        border: none;
        font-size: 2rem;
        cursor: pointer;
        transition: all 0.2s;
    }

    .star-btn:hover {
        transform: scale(1.2);
    }

    .star-btn svg {
        width: 1.8rem;
        height: 1.8rem;
        stroke: currentColor;
    }

    .star-btn.active svg {
        fill: currentColor;
    }

    .modal-buttons {
        display: flex;
        gap: 1rem;
    }

    .modal-btn {
        flex: 1;
        padding: 0.75rem;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal-btn-primary {
        background: #2563EB;
        color: white;
    }

    .modal-btn-primary:hover {
        background: #1D4ED8;
    }

    .modal-btn-secondary {
        background: #E0E7FF;
        color: #2563EB;
    }

    .modal-btn-secondary:hover {
        background: #DBEAFE;
    }

    @media (max-width: 768px) {
        .books-page-container {
            padding: 1.5rem;
        }

        .books-page-header {
            padding: 2rem 1.5rem;
        }

        .books-page-header h1 {
            font-size: 2rem;
        }

        .books-grid {
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 1.5rem;
        }

        .book-card-image {
            height: 220px;
            font-size: 3rem;
        }

        .filter-group {
            grid-template-columns: 1fr;
        }

        .filter-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="books-page-container">
    <div class="books-page-content">
        <!-- Header -->
        <div class="books-page-header">
            <h1><x-icon name="book" class="icon-inline" />Koleksi Buku</h1>
            <!-- <p>Jelajahi ribuan buku dari berbagai genre dan penulis terbaik</p> -->
                    <p>Jelajahi ribuan buku dari berbagai genre dan penulis terbaik</p>
        </div>

        <!-- Filters -->
        <div class="books-filters">
            <div class="books-filter" style="margin-bottom: 2rem;">
                <a href="{{ route('books.index') }}" class="filter-btn {{ !$selectedCategory || $selectedCategory == 'all' ? 'active' : '' }}">Semua</a>
                @foreach($categories as $category)
                    <a href="{{ route('books.index', ['category' => $category->id]) }}" class="filter-btn {{ $selectedCategory == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
                @endforeach
            </div>

            <form id="filterForm" method="GET" action="{{ route('books.index') }}">
                <div class="filter-group">
                    <div class="filter-item">
                        <label for="search"><x-icon name="search" class="icon-inline" />Cari Judul atau Penulis</label>
                        <input type="text" id="search" name="search" placeholder="Masukkan judul atau penulis..." value="{{ request('search') }}">
                    </div>

                    <div class="filter-item">
                        <label for="sort"><x-icon name="sliders" class="icon-inline" />Urutkan</label>
                        <select id="sort" name="sort">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Tertua</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Paling Populer</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                        </select>
                    </div>
                </div>

                @if($selectedCategory && $selectedCategory != 'all')
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                @endif

                <div class="filter-buttons">
                    <button type="submit" class="btn-filter"><x-icon name="search" class="icon-inline" />Cari</button>
                    <button type="reset" class="btn-filter btn-reset" onclick="window.location.href='{{ route('books.index') }}'"><x-icon name="rotate-cw" class="icon-inline" />Reset</button>
                </div>
            </form>
        </div>

        <!-- Books Grid -->
        <div class="books-grid">
            @forelse($books ?? [] as $book)
            <div class="book-item" data-url="{{ route('books.show', $book->id) }}" role="link" tabindex="0" aria-label="Lihat detail buku {{ $book->title }}">
                <div class="book-cover">
                    @if($book->cover_image_url)
                        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <span style="display:none;"><x-icon name="book-open" /></span>
                    @else
                        <x-icon name="book-open" />
                    @endif
                </div>

                <div class="book-details">
                    <span class="book-category">{{ $book->category->name ?? 'General' }}</span>
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-author">{{ $book->author }}</p>
                    @php
                        $avgRating = $book->ratings->avg('rating') ?? 0;
                        $ratingCount = $book->ratings_count ?? 0;
                    @endphp
                    <p class="book-rating" style="font-size: 0.9rem; color: #FBBF24; font-weight: 600; margin: 0.5rem 0;">
                        <x-icon name="star" class="icon-inline" />{{ number_format($avgRating, 1) }} @if($ratingCount > 0)({{ $ratingCount }})@else(belum ada)@endif
                    </p>

                    <div class="book-actions">
                        @if(auth()->user() && auth()->user()->role === 'admin')
                            <button class="btn-small btn-disabled-small" disabled><x-icon name="book" class="icon-inline" />Tidak bisa pinjam</button>
                        @else
                            @if($book->copies > 0)
                                <button class="btn-small btn-primary-small" onclick="openBorrowModal({{ $book->id }}, '{{ $book->title }}')"><x-icon name="book" class="icon-inline" />Pinjam</button>
                            @else
                                <button class="btn-small btn-disabled-small" disabled><x-icon name="book" class="icon-inline" />Habis</button>
                            @endif
                        @endif
                        <a href="{{ route('books.show', $book->id) }}" class="btn-small btn-outline-small"><x-icon name="eye" class="icon-inline" />Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; background: #DBEAFE; border-radius: 12px; border-left: 4px solid #2563EB;">
                <h3 style="color: #1E3A8A; font-size: 1.3rem; margin-bottom: 0.5rem;"><x-icon name="inbox" class="icon-inline" />Tidak Ada Buku</h3>
                <p style="color: #64748B; margin-bottom: 2rem;">Maaf, buku yang Anda cari tidak tersedia.</p>
                <a href="{{ route('books.index') }}" style="padding: 0.75rem 2rem; background: #2563EB; color: white; border-radius: 8px; text-decoration: none; font-weight: 700; display: inline-flex; align-items: center; gap: 0.5rem;"><x-icon name="arrow-right" style="transform: rotate(180deg);" />Kembali ke Koleksi</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Borrow Modal -->
<div id="borrowModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeBorrowModal()"><x-icon name="x-circle" /></button>
        <div class="modal-header">
            <x-icon name="clipboard" class="icon-inline" />Ajukan Peminjaman
        </div>
        <div class="modal-body">
            <p style="color: #64748B; margin-bottom: 1rem;">
                Anda akan meminjam buku "<strong id="borrowBookTitle" style="color: #1E3A8A;"></strong>". Durasi peminjaman adalah 14 hari.
            </p>
            <p style="color: #64748B; font-size: 0.9rem;">
                <x-icon name="calendar" class="icon-inline" />Tanggal Pengembalian: <strong id="returnDate" style="color: #1E3A8A;"></strong>
            </p>
        </div>
        <div class="modal-buttons">
            <button class="modal-btn modal-btn-secondary" onclick="closeBorrowModal()">Batal</button>
            <button class="modal-btn modal-btn-primary" onclick="confirmBorrow()"><x-icon name="check-circle" class="icon-inline" />Pinjam Sekarang</button>
        </div>
    </div>
</div>

<!-- Rating Modal -->
<div id="ratingModal" class="modal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeRatingModal()"><x-icon name="x-circle" /></button>
        <div class="modal-header">
            <x-icon name="star" class="icon-inline" />Beri Rating
        </div>
        <div class="modal-body">
            <p style="color: #64748B; margin-bottom: 1rem;">Berapa bintang rating Anda untuk "<strong id="ratingBookTitle" style="color: #1E3A8A;"></strong>"?</p>
            <div class="modal-rating" id="ratingStars"></div>
            <textarea id="reviewText" placeholder="Tulis ulasan Anda (opsional)..." style="width: 100%; padding: 0.75rem; border: 2px solid #E0E7FF; border-radius: 8px; font-family: inherit; resize: vertical; min-height: 100px;"></textarea>
        </div>
        <div class="modal-buttons">
            <button class="modal-btn modal-btn-secondary" onclick="closeRatingModal()">Batal</button>
            <button class="modal-btn modal-btn-primary" onclick="submitRating()"><x-icon name="check-circle" class="icon-inline" />Kirim Rating</button>
        </div>
    </div>
</div>

<script>
    let selectedBookId = null;
    let selectedRating = 0;
    const starSvg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';

    function bindBookCardNavigation() {
        const cards = document.querySelectorAll('.book-item[data-url]');

        cards.forEach((card) => {
            card.addEventListener('click', (event) => {
                if (event.target.closest('.book-actions, a, button, form, input, textarea, select, label')) {
                    return;
                }
                window.location.href = card.dataset.url;
            });

            card.addEventListener('keydown', (event) => {
                if (event.key !== 'Enter' && event.key !== ' ') {
                    return;
                }
                if (event.target.closest('.book-actions, a, button, form, input, textarea, select, label')) {
                    return;
                }
                event.preventDefault();
                window.location.href = card.dataset.url;
            });
        });
    }

    document.addEventListener('DOMContentLoaded', bindBookCardNavigation);

    function openBorrowModal(bookId, bookTitle) {
        selectedBookId = bookId;
        document.getElementById('borrowBookTitle').textContent = bookTitle;
        
        const today = new Date();
        const returnDate = new Date(today.getTime() + 14 * 24 * 60 * 60 * 1000);
        document.getElementById('returnDate').textContent = returnDate.toLocaleDateString('id-ID', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        document.getElementById('borrowModal').classList.add('show');
    }

    function closeBorrowModal() {
        document.getElementById('borrowModal').classList.remove('show');
    }

    function confirmBorrow() {
        alert(`Peminjaman buku berhasil diajukan! Anda akan menerima notifikasi segera.`);
        closeBorrowModal();
    }

    function openRatingModal(bookId, bookTitle) {
        selectedBookId = bookId;
        selectedRating = 0;
        document.getElementById('ratingBookTitle').textContent = bookTitle;
        document.getElementById('reviewText').value = '';
        
        const starsContainer = document.getElementById('ratingStars');
        starsContainer.innerHTML = '';
        for (let i = 1; i <= 5; i++) {
            const btn = document.createElement('button');
            btn.className = 'star-btn';
            btn.innerHTML = starSvg;
            btn.type = 'button';
            btn.onclick = (e) => { e.preventDefault(); selectRating(i); };
            starsContainer.appendChild(btn);
        }
        
        document.getElementById('ratingModal').classList.add('show');
    }

    function closeRatingModal() {
        document.getElementById('ratingModal').classList.remove('show');
    }

    function selectRating(rating) {
        selectedRating = rating;
        const stars = document.querySelectorAll('#ratingStars .star-btn');
        stars.forEach((star, index) => {
            star.classList.toggle('active', index < rating);
        });
    }

    function submitRating() {
        const review = document.getElementById('reviewText').value;
        alert(`Rating ${selectedRating} bintang berhasil dikirim!\n${review ? 'Ulasan: ' + review : ''}`);
        closeRatingModal();
    }

    // Close modals when clicking outside
    window.onclick = function(event) {
        const borrowModal = document.getElementById('borrowModal');
        const ratingModal = document.getElementById('ratingModal');
        
        if (event.target == borrowModal) {
            closeBorrowModal();
        }
        if (event.target == ratingModal) {
            closeRatingModal();
        }
    }
</script>

@endsection
