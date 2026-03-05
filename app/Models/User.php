<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     * Role types:
     * - admin   = Administrator (Full Access)
     * - user    = Regular User/Member (Anggota Perpustakaan)
     * - petugas = Library Staff/Librarian (Petugas Perpustakaan)
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loans()
    {
        return $this->hasMany(\App\Models\Loan::class);
    }

    public function favoriteBooks()
    {
        return $this->belongsToMany(\App\Models\Book::class, 'favorite_books')
            ->withTimestamps();
    }

    /**
     * Check if user is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
