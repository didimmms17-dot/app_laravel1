<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'status', 'loan_date', 'due_date', 'return_date', 'ticket_code', 'approved_at'];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function generateUniqueTicketCode()
    {
        do {
            $code = 'TKT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (self::where('ticket_code', $code)->exists());

        return $code;
    }
}
