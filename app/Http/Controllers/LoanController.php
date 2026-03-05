<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin' || $user->role === 'petugas') {
            $loans = Loan::with('user', 'book')->latest()->paginate(20);
        } else {
            $loans = $user->loans()->with('book')->latest()->paginate(20);
        }

        return view('loans.index', compact('loans'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Admin tidak bisa meminjam buku
        if ($user->role === 'admin') {
            return back()->with('error', 'Admin tidak dapat meminjam buku. Gunakan halaman Kelola Peminjaman di admin panel.');
        }

        $request->validate(['book_id' => 'required|exists:books,id']);

        $book = Book::findOrFail($request->book_id);

        // offline loan: create loan record with pending status
        $loan = Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'status' => 'pending',
        ]);

        // Create notification for admin
        Notification::create([
            'user_id' => Auth::id(),
            'loan_id' => $loan->id,
            'type' => 'loan_request',
            'title' => 'Permintaan Peminjaman Buku',
            'message' => Auth::user()->name . ' mengajukan permintaan peminjaman buku "' . $book->title . '"',
        ]);

        return back()->with('status', 'Peminjaman diajukan. Tunggu persetujuan pustakawan.');
    }

    public function approve(Loan $loan)
    {
        $user = Auth::user();
        if (!in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

        if ($loan->status !== 'pending') {
            return back()->with('warning', 'Loan not pending');
        }

        // check copies
        $book = $loan->book;
        if ($book->copies < 1) {
            $loan->update(['status' => 'rejected']);
            return back()->with('warning', 'No copies available');
        }

        $book->decrement('copies');
        $loan->update([
            'status' => 'approved',
            'loan_date' => now()->toDateString(),
            'due_date' => now()->addWeeks(2)->toDateString(),
            'approved_at' => now(),
            'ticket_code' => $loan->ticket_code ?: Loan::generateUniqueTicketCode(),
        ]);

        // Notify borrower that loan is approved
        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_approved',
            'title' => 'Peminjaman Disetujui',
            'message' => 'Peminjaman buku "' . $book->title . '" telah disetujui. Kode tiket: ' . $loan->fresh()->ticket_code,
        ]);

        return back()->with('status', 'Peminjaman disetujui.');
    }

    public function return(Loan $loan)
    {
        $user = Auth::user();
        if (!in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }
        if ($loan->status !== 'approved') {
            return back()->with('warning', 'Loan not approved');
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now()->toDateString(),
        ]);
        $loan->book->increment('copies');

        // Notify borrower that book return has been recorded
        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_returned',
            'title' => 'Buku Dikembalikan',
            'message' => 'Pengembalian buku "' . $loan->book->title . '" telah dicatat.',
        ]);

        return back()->with('status', 'Buku telah dikembalikan.');
    }

    public function userHistory()
    {
        $user = Auth::user();
        $loans = $user->loans()->with('book')->latest()->paginate(10);

        return view('loans.history', compact('loans'));
    }

    public function ticket(Loan $loan)
    {
        $user = Auth::user();
        if ($loan->user_id !== $user->id && !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

        if ($loan->status !== 'approved' && $loan->status !== 'returned') {
            return back()->with('error', 'Tiket hanya tersedia untuk peminjaman yang sudah disetujui.');
        }

        if (!$loan->ticket_code) {
            $loan->update([
                'ticket_code' => Loan::generateUniqueTicketCode(),
                'approved_at' => $loan->approved_at ?: now(),
            ]);
        }

        $loan->load('book', 'user');

        return view('loans.ticket', compact('loan'));
    }

    public function notificationsIndex()
    {
        $notifications = Notification::where('user_id', Auth::id())
            ->whereIn('type', ['loan_approved', 'loan_returned'])
            ->latest()
            ->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    public function notificationsMarkRead(Notification $notification)
    {
        if ($notification->user_id !== Auth::id()) {
            abort(403);
        }

        $notification->markAsRead();

        return back()->with('status', 'Notifikasi ditandai sudah dibaca.');
    }

    public function notificationsMarkAllRead()
    {
        Notification::where('user_id', Auth::id())
            ->whereIn('type', ['loan_approved', 'loan_returned'])
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return back()->with('status', 'Semua notifikasi ditandai sudah dibaca.');
    }
}
