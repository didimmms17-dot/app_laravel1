@extends('layouts.app')

@section('content')
<style>
    .landing-container {
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 2rem;
    }

    .landing-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        max-width: 1200px;
        margin: 0 auto;
        align-items: center;
    }

    .landing-left {
        z-index: 2;
    }

    .landing-left h1 {
        font-size: 3.5rem;
        font-weight: 900;
        line-height: 1.2;
        color: #1a1a1a;
        margin-bottom: 1.5rem;
    }

    .landing-left p {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 2.5rem;
        font-weight: 500;
    }

    .landing-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .btn-primary-landing {
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        padding: 1rem 2.5rem;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
    }

    .btn-primary-landing:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
    }

    .btn-link-landing {
        color: #2563EB;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-link-landing:hover {
        color: #1D4ED8;
        text-decoration: underline;
    }

    .landing-right {
        position: relative;
        height: 500px;
        perspective: 1000px;
    }

    .floating-card {
        position: absolute;
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        animation: float 3s ease-in-out infinite;
    }

    .floating-card:nth-child(1) {
        top: 20px;
        left: 20px;
        width: 280px;
        animation-delay: 0s;
    }

    .floating-card:nth-child(2) {
        bottom: 40px;
        right: 20px;
        width: 260px;
        animation-delay: 1s;
    }

    .floating-card:nth-child(3) {
        top: 200px;
        right: 40px;
        width: 240px;
        animation-delay: 0.5s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }

    .user-comment {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563EB, #3B82F6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        flex-shrink: 0;
    }

    .comment-content h4 {
        margin: 0 0 0.5rem 0;
        color: #1a1a1a;
        font-weight: 700;
        font-size: 0.9rem;
    }

    .comment-content p {
        margin: 0;
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .comment-content .muted {
        color: #999;
        font-size: 0.8rem;
        margin-top: 0.5rem;
    }

    .like-count {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.75rem;
        color: #2563EB;
        font-weight: 600;
        font-size: 0.85rem;
    }

    /* Favorite Books Section */
    .books-section {
        background: white;
        padding: 5rem 2rem;
    }

    .books-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .books-section h2 {
        text-align: center;
        color: #1E3A8A;
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .books-section-subtitle {
        text-align: center;
        color: #64748B;
        font-size: 1.1rem;
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .books-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2.5rem;
    }

    .book-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.08);
        border: 2px solid #E0E7FF;
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

    .book-info {
        padding: 1.5rem;
    }

    .book-title {
        color: #1E3A8A;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .book-author {
        color: #64748B;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }

    .book-category {
        display: inline-block;
        background: #EFF6FF;
        color: #2563EB;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .book-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #FBBF24;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .book-card .btn-view {
        display: block;
        text-align: center;
        margin-top: 1rem;
        padding: 0.75rem;
        background: #EFF6FF;
        color: #2563EB;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .book-card .btn-view:hover {
        background: #2563EB;
        color: white;
    }

    /* Footer Section */
    .footer-section {
        background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 100%);
        color: white;
        padding: 4rem 2rem 2rem;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .footer-section h3 {
        color: white;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .footer-section p {
        color: #DBEAFE;
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 0.75rem;
    }

    .footer-links a {
        color: #DBEAFE;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .footer-links a:hover {
        color: white;
        padding-left: 0.5rem;
    }

    .social-media {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .social-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .social-icon:hover {
        background: white;
        color: #2563EB;
        transform: translateY(-3px);
        border-color: white;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
        padding-top: 2rem;
        text-align: center;
        color: #DBEAFE;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .footer-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .social-media {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .landing-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .landing-left h1 {
            font-size: 2.5rem;
        }

        .landing-right {
            height: 400px;
        }

        .floating-card {
            position: relative !important;
            margin: 1rem auto;
            width: 90% !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
        }
    }

    /* Decorative SVG Elements */
    .decoration {
        position: fixed;
        pointer-events: none;
        z-index: 1;
    }

    .decoration-books {
        top: 5%;
        left: 2%;
        opacity: 0.8;
    }

    .decoration-guitar {
        top: 8%;
        right: 2%;
        opacity: 0.8;
    }

    .decoration-boat {
        bottom: 15%;
        left: 1%;
        opacity: 0.7;
    }

    .decoration-microphone {
        bottom: 20%;
        right: 5%;
        opacity: 0.8;
    }

    .decoration-heart {
        bottom: 10%;
        right: 8%;
        opacity: 0.75;
    }
</style>

<div class="landing-container">
    <!-- Decorative SVG Elements -->
    <svg class="decoration decoration-books" width="140" height="140" viewBox="0 0 140 140" fill="none">
        <!-- Books Stack -->
        <rect x="20" y="30" width="60" height="50" rx="8" fill="#4F46E5" opacity="0.8"/>
        <rect x="25" y="20" width="60" height="50" rx="8" fill="#6366F1"/>
        <rect x="30" y="10" width="60" height="50" rx="8" fill="#818CF8"/>
        <!-- Lines on book -->
        <line x1="40" y1="25" x2="80" y2="25" stroke="white" stroke-width="2" opacity="0.5"/>
        <line x1="40" y1="35" x2="80" y2="35" stroke="white" stroke-width="2" opacity="0.5"/>
        <line x1="40" y1="45" x2="70" y2="45" stroke="white" stroke-width="2" opacity="0.5"/>
    </svg>

    <svg class="decoration decoration-guitar" width="160" height="160" viewBox="0 0 160 160" fill="none">
        <!-- Guitar body -->
        <ellipse cx="80" cy="85" rx="35" ry="45" fill="#6366F1" stroke="#4F46E5" stroke-width="2"/>
        <circle cx="80" cy="85" r="15" fill="#E0E7FF"/>
        <!-- Neck -->
        <rect x="70" y="20" width="20" height="60" fill="#4F46E5"/>
        <!-- Head -->
        <rect x="60" y="10" width="40" height="20" rx="5" fill="#6366F1"/>
        <!-- Tuning pegs -->
        <circle cx="65" cy="15" r="3" fill="#818CF8"/>
        <circle cx="75" cy="12" r="3" fill="#818CF8"/>
        <circle cx="85" cy="12" r="3" fill="#818CF8"/>
        <circle cx="95" cy="15" r="3" fill="#818CF8"/>
        <!-- Strings -->
        <line x1="80" y1="30" x2="80" y2="130" stroke="#E0E7FF" stroke-width="1.5"/>
        <line x1="75" y1="32" x2="75" y2="128" stroke="#E0E7FF" stroke-width="1.5"/>
        <line x1="85" y1="32" x2="85" y2="128" stroke="#E0E7FF" stroke-width="1.5"/>
    </svg>

    <svg class="decoration decoration-boat" width="150" height="140" viewBox="0 0 150 140" fill="none">
        <!-- Sail -->
        <polygon points="40,30 40,100 90,120" fill="#818CF8" opacity="0.9"/>
        <polygon points="90,30 90,110 130,120" fill="#6366F1" opacity="0.8"/>
        <!-- Mast -->
        <line x1="60" y1="30" x2="60" y2="120" stroke="#4F46E5" stroke-width="2"/>
        <!-- Hull -->
        <path d="M 30 120 Q 60 135 100 130 L 95 120 Q 60 125 35 120 Z" fill="#4F46E5"/>
        <!-- Waves -->
        <path d="M 20 130 Q 30 135 40 130" stroke="#6366F1" stroke-width="2" fill="none"/>
        <path d="M 100 135 Q 110 140 120 135" stroke="#6366F1" stroke-width="2" fill="none"/>
    </svg>

    <svg class="decoration decoration-microphone" width="120" height="140" viewBox="0 0 120 140" fill="none">
        <!-- Microphone head -->
        <ellipse cx="60" cy="35" rx="20" ry="25" fill="#6366F1" stroke="#4F46E5" stroke-width="2"/>
        <!-- Grid pattern on mic -->
        <line x1="45" y1="20" x2="75" y2="20" stroke="#818CF8" stroke-width="1" opacity="0.6"/>
        <line x1="45" y1="30" x2="75" y2="30" stroke="#818CF8" stroke-width="1" opacity="0.6"/>
        <line x1="45" y1="40" x2="75" y2="40" stroke="#818CF8" stroke-width="1" opacity="0.6"/>
        <line x1="45" y1="50" x2="75" y2="50" stroke="#818CF8" stroke-width="1" opacity="0.6"/>
        <!-- Neck -->
        <rect x="55" y="60" width="10" height="40" fill="#4F46E5"/>
        <!-- Stand -->
        <rect x="50" y="100" width="20" height="30" fill="#4F46E5" rx="2"/>
        <ellipse cx="60" cy="135" rx="25" ry="8" fill="#6366F1" opacity="0.7"/>
    </svg>

    <svg class="decoration decoration-heart" width="100" height="100" viewBox="0 0 100 100" fill="none">
        <!-- Heart shape -->
        <path d="M50 85 C20 70 10 55 10 42 C10 28 20 18 30 18 C38 18 45 25 50 32 C55 25 62 18 70 18 C80 18 90 28 90 42 C90 55 80 70 50 85 Z" 
              fill="#4F46E5" stroke="#6366F1" stroke-width="2"/>
        <!-- Inner highlight -->
        <ellipse cx="40" cy="40" rx="8" ry="10" fill="#818CF8" opacity="0.6"/>
    </svg>

    <div class="landing-content">
        <!-- Left Content -->
        <div class="landing-left">
            <h1>Come for the story.<br>Stay for the connection.</h1>
            <p>Bagikan pemikiran anda, dan terhubung dengan komunitas pembaca yang antusias. Platform kami menjadikan membaca sebagai kegiatan sosial</p>
            
            <div class="landing-buttons">
            </div>
        </div>

        <!-- Right Content - Floating Cards -->
        <div class="landing-right">
            <div class="floating-card">
                <div class="user-comment">
                    <div class="user-avatar">RG</div>
                    <div class="comment-content">
                        <h4>riski ganteng</h4>
                        <p>bisakah saya meminjam dengan waktu yang lebih lama?</p>
                        <div class="like-count">❤️ 95 likes</div>
                    </div>
                </div>
            </div>

            <div class="floating-card">
                <div class="user-comment">
                    <div class="user-avatar" style="background: linear-gradient(135deg, #7C3AED, #6D28D9);">DD</div>
                    <div class="comment-content">
                        <h4>dinndinn</h4>
                        <p>Banyakk sekalii pilihan bukunyaa!!! (I love it)</p>
                        <div class="like-count">❤️ 113 likes</div>
                    </div>
                </div>
            </div>

            <div class="floating-card">
                <div class="user-comment">
                    <div class="user-avatar" style="background: linear-gradient(135deg, #06B6D4, #0891B2);">U</div>
                    <div class="comment-content">
                        <h4>ultramennnn</h4>
                        <p>aku menunggu buku keluaran terbaru</p>
                        <div class="like-count">❤️ 248 likes</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<section style="background: white; padding: 5rem 2rem; border-top: 1px solid #E0E7FF;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <!-- Left Content -->
            <div>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #1E3A8A; margin-bottom: 1.5rem; line-height: 1.3;">Tentang Platform Kami</h2>
                <p style="font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 1.5rem;">
                    Kami adalah platform perpustakaan digital modern yang dirancang untuk membuat pengalaman membaca menjadi lebih mudah, menyenangkan, dan terjangkau. Dengan teknologi terkini, kami menghubungkan pembaca dengan koleksi buku terbaik dari berbagai genre.
                </p>
                <p style="font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 2rem;">
                    Misi kami adalah memberdayakan komunitas pembaca, mendukung penulis lokal, dan menciptakan ekosistem literasi yang inklusif untuk semua orang, di mana saja.
                </p>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <h3 style="color: #2563EB; font-size: 2rem; font-weight: 900; margin-bottom: 0.5rem;">10K+</h3>
                        <p style="color: #64748B; font-weight: 500;">Buku Tersedia</p>
                    </div>
                    <div>
                        <h3 style="color: #2563EB; font-size: 2rem; font-weight: 900; margin-bottom: 0.5rem;">50K+</h3>
                        <p style="color: #64748B; font-weight: 500;">Anggota Aktif</p>
                    </div>
                    <div>
                        <h3 style="color: #2563EB; font-size: 2rem; font-weight: 900; margin-bottom: 0.5rem;">100K+</h3>
                        <p style="color: #64748B; font-weight: 500;">Peminjaman Per Bulan</p>
                    </div>
                    <div>
                        <h3 style="color: #2563EB; font-size: 2rem; font-weight: 900; margin-bottom: 0.5rem;">99%</h3>
                        <p style="color: #64748B; font-weight: 500;">Kepuasan Pengguna</p>
                    </div>
                </div>
            </div>

            <!-- Right Content - Features -->
            <div>
                <div style="background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%); border-radius: 16px; padding: 2rem; border-left: 4px solid #2563EB;">
                    <h3 style="color: #1E3A8A; font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem;">Fitur Unggulan Kami</h3>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div style="font-size: 1.5rem;"><x-icon name="book" /></div>
                            <div>
                                <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 0.5rem;">Koleksi Lengkap</h4>
                                <p style="color: #475569; font-size: 0.95rem; margin: 0;">Ribuan judul buku dari berbagai genre dan penulis</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div style="font-size: 1.5rem;">⚡</div>
                            <div>
                                <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 0.5rem;">Proses Mudah</h4>
                                <p style="color: #475569; font-size: 0.95rem; margin: 0;">Peminjaman cepat dan persetujuan instan dalam hitungan menit</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div style="font-size: 1.5rem;"><x-icon name="user" /></div>
                            <div>
                                <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 0.5rem;">Komunitas Aktif</h4>
                                <p style="color: #475569; font-size: 0.95rem; margin: 0;">Berbagi ulasan, rekomendasi, dan diskusi dengan pembaca lain</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div style="font-size: 1.5rem;"><x-icon name="phone" /></div>
                            <div>
                                <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 0.5rem;">Akses Fleksibel</h4>
                                <p style="color: #475569; font-size: 0.95rem; margin: 0;">Akses kapan saja, di mana saja melalui web dan aplikasi mobile</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                            <div style="font-size: 1.5rem;"><x-icon name="lock" /></div>
                            <div>
                                <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 0.5rem;">Aman & Terpercaya</h4>
                                <p style="color: #475569; font-size: 0.95rem; margin: 0;">Enkripsi data dan sistem keamanan tingkat enterprise</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Favorite Books Section -->
<section class="books-section">
    <div class="books-container">
        <h2><x-icon name="book" class="icon-inline" />Buku Terfavorit</h2>
        <!-- <p class="books-section-subtitle">Jelajahi koleksi buku-buku terpopuler yang telah dibaca dan disukai oleh ribuan pembaca</p> -->
            <p class="books-section-subtitle">Jelajahi koleksi buku-buku terpopuler yang telah dibaca dan disukai oleh ribuan pembaca</p>
        
        <div class="books-grid">
            @forelse ($books as $book)
            <!-- Book Card -->
            <div class="book-card">
                @if($book->cover_image_url)
                    <div class="book-cover">
                        <img src="{{ $book->cover_image_url }}" alt="{{ $book->title }}"
                             style="width:100%;height:100%;object-fit:cover;"
                             onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, #3B82F6, #60A5FA)'; this.parentElement.innerHTML='<svg style=&quot;width:56px;height:56px;stroke:white;&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><path d=&quot;M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z&quot;></path><path d=&quot;M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z&quot;></path></svg>';">
                    </div>
                @else
                    <div class="book-cover" style="display: flex; align-items: center; justify-content: center; font-size: 3.5rem; background: linear-gradient(135deg, #3B82F6, #60A5FA);">
                        <x-icon name="book-open" />
                    </div>
                @endif
                <div class="book-info">
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-author">{{ $book->author }}</p>
                    @if($book->category)
                        <span class="book-category">{{ $book->category->name }}</span>
                    @endif
                    <div class="book-rating">
                        @php
                            $avgRating = $book->ratings->avg('rating') ?? 0;
                            $ratingCount = $book->ratings_count ?? 0;
                        @endphp
                        <x-icon name="star" class="icon-inline" />{{ number_format($avgRating, 1) }} 
                        @if($ratingCount > 0)
                            ({{ $ratingCount }} ulasan)
                        @else
                            (belum ada ulasan)
                        @endif
                    </div>
                    <a href="{{ route('books.show', $book->id) }}" class="btn-view">Lihat Detail</a>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <p style="color: #64748B; font-size: 1.1rem;">Belum ada buku yang tersedia</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Footer Section -->
<section class="footer-section">
    <div class="footer-container">
        <div class="footer-content">
            <!-- About Footer -->
            <div>
                <h3><x-icon name="book" class="icon-inline" />Perpustakaan Digital</h3>
                <p>Platform perpustakaan digital modern yang menghubungkan pembaca dengan koleksi buku terbaik. Bergabunglah dengan komunitas pembaca kami hari ini.</p>
                <div class="social-media">
                    <a href="https://wa.me/62812345678" target="_blank" class="social-icon" title="WhatsApp">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371 0-.57 0-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.798c0 2.73.738 5.398 2.138 7.747L2.885 23.96l8.387-2.197c2.26 1.232 4.808 1.881 7.516 1.881 5.45 0 9.859-4.41 9.887-9.862.01-2.638-.997-5.122-2.817-6.979-1.819-1.858-4.291-2.88-6.875-2.898z"/>
                        </svg>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon" title="Instagram">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163C8.717 0 8.283.012 7.028.072 2.635.272.273 2.69.073 7.052.012 8.308 0 8.742 0 12s.012 3.692.072 4.948c.2 4.358 2.571 6.763 6.942 6.963C8.283 23.988 8.717 24 12 24s3.717-.012 4.951-.072c4.406-.2 6.828-2.645 7.037-7.007.06-1.25.074-1.692.074-4.921s-.015-3.628-.074-4.868c-.213-4.373-2.636-6.8-7.012-7.003C15.667.072 15.233.06 12 .06z"/>
                            <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8z"/>
                            <circle cx="18.406" cy="5.594" r="1.44"/>
                        </svg>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="social-icon" title="Facebook">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('books.index') }}">Koleksi Buku</a></li>
                    <li><a href="{{ route('categories.index') }}">Kategori</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#features">Fitur</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Panduan Pengguna</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3>Hubungi Kami</h3>
                <p><x-icon name="mail" class="icon-inline" />Email: info@perpustakaan.com</p>
                <p><x-icon name="phone" class="icon-inline" />Telepon: +62 812 3456 7890</p>
                <p><x-icon name="map-pin" class="icon-inline" />Alamat: Jakarta, Indonesia</p>
                <p style="margin-top: 1.5rem; color: #DBEAFE;">Jam Operasional: 09:00 - 21:00 (Senin - Minggu)</p>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Perpustakaan Digital. Semua hak dilindungi. Dibuat dengan ❤️ untuk para pembaca Indonesia.</p>
        </div>
    </div>
</section>

@endsection
