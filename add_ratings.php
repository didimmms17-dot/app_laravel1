<?php
$dashboard = file_get_contents('resources/views/dashboard.blade.php');

// Array of books dengan rating
$books = [
    ['title' => 'Laskar Pelangi', 'rating' => '4.8', 'reviews' => '892'],
    ['title' => 'Perahu Kertas', 'rating' => '4.7', 'reviews' => '756'],
    ['title' => 'Negeri 5 Menara', 'rating' => '4.9', 'reviews' => '1023'],
    ['title' => 'Ayat-Ayat Cinta', 'rating' => '4.6', 'reviews' => '645'],
    ['title' => 'Surat Kecil untuk Tuhan', 'rating' => '4.7', 'reviews' => '812'],
    ['title' => 'Sang Pemimpi', 'rating' => '4.8', 'reviews' => '734'],
    ['title' => 'Ketika Cinta Bertabrakan', 'rating' => '4.5', 'reviews' => '892'],
    ['title' => 'Petualangan di Langit Malam', 'rating' => '4.9', 'reviews' => '2145'],
    ['title' => 'Steve Jobs - Biografi', 'rating' => '4.7', 'reviews' => '1567'],
    ['title' => 'Pembunuh di Balik Gorden', 'rating' => '4.8', 'reviews' => '1834'],
    ['title' => 'Hidup Penuh Makna', 'rating' => '4.6', 'reviews' => '1203'],
    ['title' => 'Cinta di Musim Gugur', 'rating' => '4.7', 'reviews' => '1456'],
    ['title' => 'Pameran Kehidupan', 'rating' => '4.9', 'reviews' => '2001'],
    ['title' => 'Mandela - Perjalanan Menuju Kebebasan', 'rating' => '4.8', 'reviews' => '876'],
    ['title' => 'Senyum Rahasia Mona Lisa', 'rating' => '4.6', 'reviews' => '2345'],
    ['title' => 'Dari Ketakutan Menuju Harapan', 'rating' => '4.7', 'reviews' => '634'],
    ['title' => 'Surat Cinta dari Paris', 'rating' => '4.8', 'reviews' => '1998'],
    ['title' => 'Perjalanan ke Dunia Paralel', 'rating' => '4.7', 'reviews' => '1567'],
    ['title' => 'Audrey Hepburn - Kehidupan Penuh Warna', 'rating' => '4.6', 'reviews' => '745'],
    ['title' => 'Hantu di Kastil Tua', 'rating' => '4.9', 'reviews' => '1876'],
    ['title' => 'Sukses Dimulai dari Mimpi', 'rating' => '4.5', 'reviews' => '1123'],
    ['title' => 'Me Before You', 'rating' => '4.6', 'reviews' => '2234'],
    ['title' => 'Harry Potter dan Batu Bertuah', 'rating' => '4.9', 'reviews' => '3456'],
    ['title' => 'Elon Musk - Biografi Tidak Resmi', 'rating' => '4.7', 'reviews' => '1834'],
    ['title' => 'Kode Keamanan Terakhir', 'rating' => '4.8', 'reviews' => '1567'],
    ['title' => 'Kekuatan Kebiasaan Baik', 'rating' => '4.9', 'reviews' => '2876'],
];

// Replace ratings for each book
foreach ($books as $book) {
    $pattern = '/<h3 class="book-title">' . preg_quote($book['title'], '/') . '<\/h3>\s*<p class="book-author">([^<]+)<\/p>\s*<span class="book-category">([^<]+)<\/span>/';
    $replacement = '<h3 class="book-title">' . $book['title'] . '</h3>' . "\n" .
                   '                        <p class="book-author">$1</p>' . "\n" .
                   '                        <span class="book-category">$2</span>' . "\n" .
                   '                        <div class="book-rating">⭐ ' . $book['rating'] . ' (' . $book['reviews'] . ' ulasan)</div>';
    $dashboard = preg_replace($pattern, $replacement, $dashboard);
}

file_put_contents('resources/views/dashboard.blade.php', $dashboard);
echo "✓ Updated dashboard with ratings\n";
?>
