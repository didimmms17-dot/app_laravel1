# Admin Role Setup - Panduan Implementasi

Sistem admin panel telah dibuat dengan fitur-fitur lengkap. Berikut panduan setup dan penggunaan:

## 📋 Fitur yang Telah Dibuat

### 1. **Admin Dashboard**
   - Menampilkan statistik: Total Users, Total Books, Total Loans, Unread Notifications
   - Quick action buttons untuk akses cepat ke fitur-fitur utama

### 2. **Users Management (CRUD)**
   - ✅ Create: Tambah user baru dengan role (admin, member, librarian)
   - ✅ Read: Lihat daftar semua users dengan pagination
   - ✅ Update: Edit data user (nama, email, role, address)
   - ✅ Delete: Hapus user dari sistem

### 3. **Books Management (CRUD)**
   - ✅ Create: Tambah buku baru dengan kategori dan jumlah copy
   - ✅ Read: Lihat daftar semua buku dengan pagination
   - ✅ Update: Edit data buku (judul, author, ISBN, kategori, stok)
   - ✅ Delete: Hapus buku dari sistem

### 4. **Loans Management**
   - ✅ Lihat daftar semua peminjaman dengan status
   - ✅ Approve peminjaman (pending → approved)
   - ✅ Reject peminjaman dengan alasan
   - ✅ Tandai peminjaman sebagai returned
   - ✅ Lihat detail lengkap setiap peminjaman

### 5. **Notifications System**
   - ✅ Admin menerima notifikasi otomatis saat ada loan request baru
   - ✅ Admin mendapat notifikasi perubahan status peminjaman
   - ✅ Notifikasi dapat ditandai sebagai read/unread
   - ✅ Sistem penyimpanan notifikasi di database
   - ✅ Interface untuk melihat dan mengelola notifikasi

## 🚀 Cara Setup

### Step 1: Jalankan Migration
```bash
php artisan migrate
```

Ini akan membuat tabel `notifications` dan field `role` di tabel `users`.

### Step 2: Buat Admin User (Optional - Manual di Database)
Jika ingin membuat admin user secara manual di database:
```sql
INSERT INTO users (name, email, password, role, created_at, updated_at) 
VALUES ('Admin', 'admin@example.com', bcrypt('password123'), 'admin', NOW(), NOW());
```

Atau gunakan command:
```bash
php artisan tinker
```

Kemudian:
```php
$user = User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password123'),
    'role' => 'admin'
]);
```

## 📍 URL Routes Admin

Semua route admin dimulai dengan `/admin` dan memerlukan autentikasi serta role admin.

| Feature | URL | Method |
|---------|-----|--------|
| Dashboard | `/admin` | GET |
| Users List | `/admin/users` | GET |
| Create User | `/admin/users/create` | GET |
| Store User | `/admin/users` | POST |
| Edit User | `/admin/users/{id}/edit` | GET |
| Update User | `/admin/users/{id}` | PUT |
| Delete User | `/admin/users/{id}` | DELETE |
| Books List | `/admin/books` | GET |
| Create Book | `/admin/books/create` | GET |
| Store Book | `/admin/books` | POST |
| Edit Book | `/admin/books/{id}/edit` | GET |
| Update Book | `/admin/books/{id}` | PUT |
| Delete Book | `/admin/books/{id}` | DELETE |
| Loans List | `/admin/loans` | GET |
| Loan Details | `/admin/loans/{id}` | GET |
| Approve Loan | `/admin/loans/{id}/approve` | POST |
| Reject Loan | `/admin/loans/{id}/reject` | POST |
| Return Loan | `/admin/loans/{id}/return` | POST |
| Notifications | `/admin/notifications` | GET |
| View Notification | `/admin/notifications/{id}` | GET |
| Mark as Read | `/admin/notifications/{id}/mark-read` | POST |
| Delete Notification | `/admin/notifications/{id}` | DELETE |
| Clear All Notifications | `/admin/notifications/clear` | POST |

## 🔐 Middleware & Security

- Semua route admin dilindungi dengan middleware `auth` (harus login)
- Semua route admin memerlukan middleware `admin` (harus role admin)
- Validasi data pada setiap Create/Update operation
- CSRF protection pada semua form

## 🎨 UI/UX

- **Layout Responsif**: Design Bootstrap 5 yang modern dan clean
- **Sidebar Navigation**: Menu navigasi yang intuitif
- **Flash Messages**: Alert success/error untuk feedback user
- **Pagination**: Daftar data dengan pagination
- **Badges & Icons**: Visual indicators untuk status
- **Color Coding**: 
  - Admin (Merah)
  - Librarian (Kuning)
  - Member (Biru)

## 📧 Sistem Notifikasi

### Notifikasi Otomatis Dikirim Kepada Admin Ketika:

1. **Loan Request** (`loan_request`)
   - Saat member mengajukan peminjaman buku baru
   - Pesan: "[Username] mengajukan permintaan peminjaman buku [Book Title]"

2. **Loan Approved** (`loan_approved`)
   - Saat admin menyetujui peminjaman
   - Pesan: "Peminjaman buku [Book Title] telah disetujui oleh admin"

3. **Loan Rejected** (`loan_rejected`)
   - Saat admin menolak peminjaman
   - Pesan: "Peminjaman buku [Book Title] ditolak. Alasan: [Reason]"

4. **Loan Returned** (`loan_returned`)
   - Saat buku dikembalikan dan dicatat oleh admin
   - Pesan: "Pengembalian buku [Book Title] telah dicatat oleh admin"

## 📁 File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AdminController.php        # Main admin controller
│   └── Middleware/
│       ├── EnsureUserIsAdmin.php      # Admin middleware
│       └── RoleMiddleware.php         # Role middleware
├── Models/
│   ├── Notification.php               # Notification model
│   ├── User.php                       # User model (updated)
│   ├── Loan.php                       # Loan model
│   └── Book.php                       # Book model

database/
├── migrations/
│   └── 2026_01_30_000001_create_notifications_table.php

resources/
└── views/
    └── admin/
        ├── layout.blade.php           # Main admin layout
        ├── dashboard.blade.php        # Admin dashboard
        ├── users/
        │   ├── index.blade.php
        │   ├── create.blade.php
        │   └── edit.blade.php
        ├── books/
        │   ├── index.blade.php
        │   ├── create.blade.php
        │   └── edit.blade.php
        ├── loans/
        │   ├── index.blade.php
        │   └── show.blade.php
        └── notifications/
            ├── index.blade.php
            └── show.blade.php

routes/
└── web.php                            # Updated with admin routes
```

## ⚙️ Konfigurasi Tambahan

### Update Kernel.php (jika belum ada middleware admin)

Jika middleware `admin` belum terdaftar di `app/Http/Kernel.php`, tambahkan:

```php
protected $routeMiddleware = [
    // ... existing middleware
    'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
];
```

### Update Model User

User model sudah di-update untuk:
- Memiliki field `role` (admin, member, librarian)
- Memiliki relasi `loans()`

### Update Model Loan

Loan model sudah memiliki relasi ke User dan Book.

## 🧪 Testing

1. **Login sebagai Admin**
   - Akses `/admin` setelah login dengan user yang memiliki role `admin`

2. **Test Notifikasi**
   - Login sebagai Member
   - Ajukan peminjaman buku
   - Login ulang sebagai Admin
   - Lihat notifikasi baru di `/admin/notifications`

3. **Test CRUD Users**
   - Buat user baru dari Admin Dashboard
   - Edit user yang ada
   - Hapus user (tidak bisa hapus admin yang sedang login)

4. **Test CRUD Books**
   - Tambah buku baru
   - Edit data buku
   - Hapus buku

5. **Test Loans Management**
   - Lihat daftar loan
   - Approve/reject loan
   - Tandai loan sebagai returned

## 📝 Notes

- Default role untuk user baru adalah `member` (bisa diubah saat create)
- Validasi mencegah duplikasi email
- Notifikasi otomatis disimpan di database untuk history
- Admin bisa melihat semua data di sistem

## 🔄 Integrasi Dengan Sistem Existing

Sistem admin ini sudah terintegrasi dengan:
- ✅ Authentication system yang sudah ada
- ✅ Loan management system
- ✅ Book management system
- ✅ User management system

Tidak ada breaking changes pada sistem yang sudah berjalan.
