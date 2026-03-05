<?php

$file = 'resources/views/welcome.blade.php';
$content = file_get_contents($file);

// Book mapping
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
];

foreach($books as $title => $id) {
    // Find pattern: <h3 class="book-title">TITLE</h3>....<a href="{{ route('books.index') }}" class="btn-view">
    $pattern = '/(<h3 class="book-title">' . preg_quote($title) . '<\/h3>.*?)<a href="{{ route\(\'books\.index\'\) }}" class="btn-view">/s';
    $replacement = '$1<a href="{{ route(\'books.show\', ' . $id . ') }}" class="btn-view">';
    
    $content = preg_replace($pattern, $replacement, $content);
    echo "Fixed: $title (ID: $id)\n";
}

file_put_contents($file, $content);
echo "\nDone! All links fixed.\n";
?>
