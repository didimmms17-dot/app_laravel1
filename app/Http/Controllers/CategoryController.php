<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::withCount('books')->get();
        return view('categories.index', compact('categories'));
    }

    // Show books by category
    public function show(Category $category)
    {
        $books = $category->books()->with('category', 'ratings')->withCount('ratings')->get();
        return view('categories.show', compact('category', 'books'));
    }
}
