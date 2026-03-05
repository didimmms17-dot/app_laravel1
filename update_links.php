<?php
$dashboard = file_get_contents('resources/views/dashboard.blade.php');

// Update Detail links with proper book IDs (1-26)
$books = [
    'Laskar Pelangi' => 1,
    'Perahu Kertas' => 2,
    'Negeri 5 Menara' => 3,
    'Ayat-Ayat Cinta' => 4,
    'Surat Kecil untuk Tuhan' => 5,
    'Sang Pemimpi' => 6,
    'Ketika Cinta Bertabrakan' => 7,
    'Petualangan di Langit Malam' => 8,
    'Steve Jobs - Biografi' => 9,
    'Pembunuh di Balik Gorden' => 10,
    'Hidup Penuh Makna' => 11,
    'Cinta di Musim Gugur' => 12,
    'Pameran Kehidupan' => 13,
    'Mandela - Perjalanan Menuju Kebebasan' => 14,
    'Senyum Rahasia Mona Lisa' => 15,
    'Dari Ketakutan Menuju Harapan' => 16,
    'Surat Cinta dari Paris' => 17,
    'Perjalanan ke Dunia Paralel' => 18,
    'Audrey Hepburn - Kehidupan Penuh Warna' => 19,
    'Hantu di Kastil Tua' => 20,
    'Sukses Dimulai dari Mimpi' => 21,
    'Me Before You' => 22,
    'Harry Potter dan Batu Bertuah' => 23,
    'Elon Musk - Biografi Tidak Resmi' => 24,
    'Kode Keamanan Terakhir' => 25,
    'Kekuatan Kebiasaan Baik' => 26,
];

foreach ($books as $title => $id) {
    // Find pattern: <h3 class="book-title">TITLE</h3>....<a href="{{ route('books.show', 1) }}"
    $pattern = '/(<h3 class="book-title">' . preg_quote($title, '/') . '<\/h3>.*?<a href="\{\{ route\(\'books\.show\', )\d+(\) \}\}" class="btn-small btn-outline-small">)/s';
    $replacement = '$1' . $id . '$2';
    $dashboard = preg_replace($pattern, $replacement, $dashboard);
}

file_put_contents('resources/views/dashboard.blade.php', $dashboard);
echo "✓ Updated all Detail links with proper book IDs\n";
?>
