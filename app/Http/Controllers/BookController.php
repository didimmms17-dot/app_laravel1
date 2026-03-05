<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->query('category');
        $searchQuery = $request->query('search');

        $query = Book::with('category', 'ratings')->withCount('ratings');

        // Filter by category
        if ($selectedCategory && $selectedCategory != 'all') {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('id', $selectedCategory);
            });
        }

        // Filter by search
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', '%' . $searchQuery . '%')
                  ->orWhere('author', 'like', '%' . $searchQuery . '%');
            });
        }

        $books = $query->paginate(12);

        return view('books.index', compact('books', 'categories', 'selectedCategory', 'searchQuery'));
    }

    public function show($id)
    {
        // Try to find real book first
        $book = Book::find($id);

        if (!$book) {
            // Fallback sample book when DB doesn't contain the requested id
            $book = (object)[
                'id' => $id,
                'cover_image' => null,
                'category' => (object)['name' => 'General'],
                'title' => 'Contoh Buku #' . $id,
                'author' => 'Penulis Contoh',
                'copies' => 2,
                'publisher' => 'Penerbit Contoh',
                'year_published' => date('Y'),
                'pages' => 200,
                'description' => null,
                'isbn' => null,
                'language' => 'Indonesia',
                'type' => 'Buku Cetak',
                'format' => 'Softcover'
            ];

            $ratings = collect();
            $isFavorited = false;
            return view('books.show', compact('book', 'ratings', 'isFavorited'));
        }

        $ratings = $book->ratings()->with('user')->latest()->get();
        $isFavorited = Auth::check()
            ? Auth::user()->favoriteBooks()->where('book_id', $book->id)->exists()
            : false;
        return view('books.show', compact('book', 'ratings', 'isFavorited'));
    }

    // Admin: show create form
    public function create()
    {
        return view('books.create');
    }

    // Admin: store new book
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'copies' => 'required|integer|min:0',
        ]);
        Book::create($data);
        return redirect()->route('books.index')->with('status', 'Buku berhasil ditambahkan');
    }

    // Admin: edit form
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Admin: update
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'copies' => 'required|integer|min:0',
        ]);
        $book->update($data);
        return redirect()->route('books.show', $book)->with('status', 'Buku diperbarui');
    }

    // Admin: destroy
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('status', 'Buku dihapus');
    }

    // Welcome page with featured books
    public function welcome()
    {
        $books = Book::with('category', 'ratings')
            ->withCount('ratings')
            ->get();

        return view('welcome', compact('books'));
    }

    // Store rating/review
    public function storeRating(Request $request, Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:500',
        ]);

        Rating::updateOrCreate(
            [
                'book_id' => $book->id,
                'user_id' => Auth::id(),
            ],
            [
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]
        );

        return redirect()->route('books.show', $book)->with('status', 'Rating berhasil disimpan');
    }
}
