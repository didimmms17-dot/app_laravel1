<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $totalLoans = Loan::count();
        $unreadNotifications = Notification::whereNull('read_at')->count();
        $activeLoans = Loan::where('status', 'active')->count();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBooks',
            'totalLoans',
            'unreadNotifications',
            'activeLoans'
        ));
    }

    // ==================== USERS MANAGEMENT ====================
    public function usersIndex()
    {
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // ==================== PETUGAS MANAGEMENT ====================
    public function staffIndex()
    {
        $petugas = User::where('role', 'petugas')->latest()->paginate(10);
        return view('admin.users.staff', compact('petugas'));
    }

    public function staffCreate()
    {
        return view('admin.users.staff-create');
    }

    public function staffStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'address' => 'nullable|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'petugas';

        User::create($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Petugas berhasil dibuat!');
    }

    public function staffEdit(User $staff)
    {
        if ($staff->role !== 'petugas') {
            abort(404);
        }

        return view('admin.users.staff-edit', ['staff' => $staff]);
    }

    public function staffUpdate(Request $request, User $staff)
    {
        if ($staff->role !== 'petugas') {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $staff->id,
            'address' => 'nullable|string',
        ]);

        $validated['role'] = 'petugas';
        $staff->update($validated);

        return redirect()->route('admin.staff.index')->with('success', 'Data petugas berhasil diperbarui!');
    }

    public function staffDestroy(User $staff)
    {
        if ($staff->role !== 'petugas') {
            abort(404);
        }

        if ($staff->id === auth()->id()) {
            return redirect()->route('admin.staff.index')->with('error', 'Tidak bisa menghapus akun petugas yang sedang login!');
        }

        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Petugas berhasil dihapus!');
    }

    // ==================== BOOKS MANAGEMENT ====================
    public function booksIndex()
    {
        $books = Book::with('category')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function booksCreate()
    {
        $categories = \App\Models\Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function booksStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'copies' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function booksEdit(Book $book)
    {
        $categories = \App\Models\Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function booksUpdate(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'copies' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function booksDestroy(Book $book)
    {
        if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil dihapus!');
    }

    // ==================== LOANS MANAGEMENT ====================
    public function loansIndex()
    {
        $loans = Loan::with('user', 'book')->paginate(10);
        return view('admin.loans.index', compact('loans'));
    }

    public function loansShow(Loan $loan)
    {
        return view('admin.loans.show', compact('loan'));
    }

    public function reportsIndex(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        $borrowReportsQuery = Loan::with(['user', 'book'])
            ->whereNotNull('loan_date');

        $returnReportsQuery = Loan::with(['user', 'book'])
            ->whereNotNull('return_date')
            ->where('status', 'returned');

        if ($from) {
            $borrowReportsQuery->whereDate('loan_date', '>=', $from);
            $returnReportsQuery->whereDate('return_date', '>=', $from);
        }

        if ($to) {
            $borrowReportsQuery->whereDate('loan_date', '<=', $to);
            $returnReportsQuery->whereDate('return_date', '<=', $to);
        }

        $borrowReports = $borrowReportsQuery->latest('loan_date')->paginate(10, ['*'], 'borrow_page');
        $returnReports = $returnReportsQuery->latest('return_date')->paginate(10, ['*'], 'return_page');

        $totalBorrowed = (clone $borrowReportsQuery)->count();
        $totalReturned = (clone $returnReportsQuery)->count();

        return view('admin.reports.index', compact(
            'borrowReports',
            'returnReports',
            'from',
            'to',
            'totalBorrowed',
            'totalReturned'
        ));
    }

    public function loansApprove(Request $request, Loan $loan)
    {
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Status pinjaman sudah ' . $loan->status);
        }

        $updateData = [
            'status' => 'approved',
            'approved_at' => now(),
        ];

        if (!$loan->ticket_code) {
            $updateData['ticket_code'] = Loan::generateUniqueTicketCode();
        }
        if (!$loan->loan_date) {
            $updateData['loan_date'] = now()->toDateString();
        }
        if (!$loan->due_date) {
            $updateData['due_date'] = now()->addWeeks(2)->toDateString();
        }

        $loan->update($updateData);

        // Create notification for borrower
        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_approved',
            'title' => 'Peminjaman Disetujui',
            'message' => 'Peminjaman buku "' . $loan->book->title . '" telah disetujui oleh admin. Kode tiket: ' . $loan->ticket_code,
        ]);

        return back()->with('success', 'Peminjaman disetujui!');
    }

    public function loansReject(Request $request, Loan $loan)
    {
        if ($loan->status !== 'pending') {
            return back()->with('error', 'Status pinjaman sudah ' . $loan->status);
        }

        $reason = $request->validate(['reason' => 'required|string'])['reason'];
        $loan->update(['status' => 'rejected']);

        // Create notification for borrower
        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_rejected',
            'title' => 'Peminjaman Ditolak',
            'message' => 'Peminjaman buku "' . $loan->book->title . '" ditolak. Alasan: ' . $reason,
        ]);

        return back()->with('success', 'Peminjaman ditolak!');
    }

    public function loansReturn(Request $request, Loan $loan)
    {
        if ($loan->status !== 'approved') {
            return back()->with('error', 'Status pinjaman harus "approved" untuk dikembalikan');
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        // Create notification for borrower
        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_returned',
            'title' => 'Buku Diterima',
            'message' => 'Pengembalian buku "' . $loan->book->title . '" telah dicatat oleh admin.',
        ]);

        return back()->with('success', 'Pengembalian buku dicatat!');
    }

    // ==================== NOTIFICATIONS ====================
    public function notificationsIndex()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.notifications.index', compact('notifications'));
    }

    public function notificationsShow(Notification $notification)
    {
        $notification->markAsRead();
        return view('admin.notifications.show', compact('notification'));
    }

    public function notificationsMarkAsRead(Notification $notification)
    {
        $notification->markAsRead();
        return back()->with('success', 'Notifikasi sudah dibaca');
    }

    public function notificationsDelete(Notification $notification)
    {
        $notification->delete();
        return back()->with('success', 'Notifikasi dihapus');
    }

    public function notificationsClearAll()
    {
        Notification::delete();
        return redirect()->route('admin.notifications')->with('success', 'Semua notifikasi dihapus');
    }

    // ==================== CATEGORIES MANAGEMENT ====================
    public function categoriesIndex()
    {
        $categories = \App\Models\Category::withCount('books')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }

    public function categoriesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        // Generate slug dari name
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        \App\Models\Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function categoriesEdit(\App\Models\Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, \App\Models\Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function categoriesDestroy(\App\Models\Category $category)
    {
        // Cek apakah kategori memiliki buku
        if ($category->books()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Tidak bisa menghapus kategori yang memiliki buku!');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}

