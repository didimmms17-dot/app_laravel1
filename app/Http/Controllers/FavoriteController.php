<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'user') {
            return redirect()->route('welcome');
        }
        $books = $user->favoriteBooks()
            ->with('category', 'ratings')
            ->withCount('ratings')
            ->latest()
            ->paginate(12);

        return view('favorites.index', compact('books'));
    }

    public function toggle(Book $book)
    {
        $user = Auth::user();

        if ($user->role !== 'user') {
            return response()->json([
                'favorited' => false,
                'message' => 'Hanya user yang dapat menambahkan favorit.',
            ], 403);
        }

        $isFavorited = $user->favoriteBooks()->where('book_id', $book->id)->exists();

        if ($isFavorited) {
            $user->favoriteBooks()->detach($book->id);
            return response()->json(['favorited' => false]);
        }

        $user->favoriteBooks()->attach($book->id);
        return response()->json(['favorited' => true]);
    }
}
