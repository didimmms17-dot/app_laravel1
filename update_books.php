<?php
$dashboard = file_get_contents('resources/views/dashboard.blade.php');

// Replace all heart buttons with Detail links
// Pattern: <button class="btn-small btn-outline-small">❤️</button>
$dashboard = preg_replace(
    '/<button class="btn-small btn-outline-small">[^<]*<\/button>/',
    '<a href="{{ route(\'books.show\', 1) }}" class="btn-small btn-outline-small">👁️ Detail</a>',
    $dashboard
);

file_put_contents('resources/views/dashboard.blade.php', $dashboard);
echo "✓ Updated dashboard.blade.php with Detail buttons\n";

// Also update books index if needed
$booksIndex = file_get_contents('resources/views/books/index.blade.php');
// Already has Detail button, just verify
if (strpos($booksIndex, '👁️ Detail') !== false) {
    echo "✓ Books index already has Detail buttons\n";
}
?>
