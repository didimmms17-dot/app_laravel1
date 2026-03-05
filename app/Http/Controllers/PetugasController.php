<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Notification;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $loanRequests = Loan::where('status', 'pending')->with('user', 'book')->get();
        $returnRequests = Loan::where('status', 'returned')->with('user', 'book')->get();

        return view('petugas.dashboard', compact('loanRequests', 'returnRequests'));
    }

    public function confirmLoan(Request $request, $loanId)
    {
        $loan = Loan::with('book')->findOrFail($loanId);
        $loan->update([
            'status' => 'approved',
            'approved_at' => now(),
            'ticket_code' => $loan->ticket_code ?: Loan::generateUniqueTicketCode(),
            'loan_date' => $loan->loan_date ?: now()->toDateString(),
            'due_date' => $loan->due_date ?: now()->addWeeks(2)->toDateString(),
        ]);

        Notification::create([
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'type' => 'loan_approved',
            'title' => 'Peminjaman Disetujui',
            'message' => 'Peminjaman buku "' . $loan->book->title . '" telah disetujui oleh petugas. Kode tiket: ' . $loan->ticket_code,
        ]);

        return back()->with('success', 'Peminjaman telah dikonfirmasi.');
    }
}
