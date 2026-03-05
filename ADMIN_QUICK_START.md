# 🚀 QUICK START - Admin Role Implementation

## ✅ Fitur yang Sudah Dibuat

### 1. **Dashboard Admin**
- Statistik total users, books, loans, dan notifications
- Quick actions untuk akses cepat

### 2. **Users Management (CRUD Lengkap)**
- Tambah user baru (Create)
- Lihat daftar users (Read)
- Edit data user (Update)
- Hapus user (Delete)

### 3. **Books Management (CRUD Lengkap)**
- Tambah buku (Create)
- Lihat daftar books (Read)
- Edit data book (Update)
- Hapus book (Delete)

### 4. **Loans Management**
- Lihat semua loan requests
- Approve loan (pending → approved)
- Reject loan dengan alasan
- Mark loan sebagai returned
- Lihat detail lengkap setiap loan

### 5. **Notifications System**
- Admin menerima notifikasi otomatis saat ada loan request
- Notifikasi untuk perubahan status loan (approved, rejected, returned)
- Mark notifikasi sebagai read/unread
- Delete notifikasi individual
- Clear all notifications
- Badge count untuk unread notifications

## 🎯 Cara Menggunakan

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Buat Admin User
```bash
php artisan tinker
```

Kemudian paste:
```php
$user = App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@localhost',
    'password' => Hash\Hash::make('admin123'),
    'role' => 'admin'
]);
```

### 3. Login & Akses Admin Panel
- URL: `http://localhost:8000/admin`
- Email: `admin@localhost`
- Password: `admin123`

## 📍 Main Routes

| URL | Description |
|-----|-------------|
| `/admin` | Dashboard |
| `/admin/users` | Manage Users |
| `/admin/books` | Manage Books |
| `/admin/loans` | Manage Loans |
| `/admin/notifications` | View Notifications |

## 🔔 Automatic Notifications

Admin akan otomatis menerima notifikasi ketika:

1. **Member mengajukan peminjaman** → Type: `loan_request`
2. **Admin approve peminjaman** → Notif ke member
3. **Admin reject peminjaman** → Notif ke member
4. **Member return buku** → Admin dicatat

## 📁 Files yang Dibuat/Dimodifikasi

**Controller:**
- `app/Http/Controllers/AdminController.php` (BARU)

**Models:**
- `app/Models/Notification.php` (BARU)

**Migrations:**
- `database/migrations/2026_01_30_000001_create_notifications_table.php` (BARU)

**Views:**
- `resources/views/admin/layout.blade.php` (BARU)
- `resources/views/admin/dashboard.blade.php` (BARU)
- `resources/views/admin/users/` (BARU)
- `resources/views/admin/books/` (BARU)
- `resources/views/admin/loans/` (BARU)
- `resources/views/admin/notifications/` (BARU)

**Routes & Config:**
- `routes/web.php` (DIMODIFIKASI)
- `app/Providers/AppServiceProvider.php` (DIMODIFIKASI)
- `app/Http/Controllers/LoanController.php` (DIMODIFIKASI)

**Middleware:** (Sudah ada, tinggal digunakan)
- `app/Http/Middleware/EnsureUserIsAdmin.php` (EXISTING)

## 💾 Database

Tabel baru yang dibuat:
```sql
CREATE TABLE notifications (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    loan_id BIGINT,
    type VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    message LONGTEXT NOT NULL,
    read_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (loan_id) REFERENCES loans(id) ON DELETE CASCADE
);
```

## 🎨 UI Features

- Clean & modern Bootstrap 5 design
- Responsive sidebar navigation
- Flash messages untuk feedback
- Status badges dengan color coding
- Pagination untuk daftar data
- Modal dialogs untuk action confirmation

## 🔐 Security

✅ Authentication required (middleware 'auth')
✅ Admin role check required (middleware 'admin')
✅ CSRF protection pada semua forms
✅ Input validation pada setiap operation
✅ Mass assignment protection

## 🧪 Testing Notifikasi

1. Login sebagai Member
2. Buka halaman Books
3. Klik "Pinjam" pada sebuah buku
4. Logout dan login sebagai Admin
5. Buka `/admin/notifications`
6. Lihat notifikasi "Permintaan Peminjaman Buku"
7. Klik "View" untuk lihat detail
8. Di halaman Loans, approve/reject/return
9. Lihat notifikasi baru di notification center

## 📧 Notifikasi Type

```
- loan_request: Member mengajukan peminjaman
- loan_approved: Peminjaman disetujui
- loan_rejected: Peminjaman ditolak
- loan_returned: Buku telah dikembalikan
```

---

**Dokumentasi lengkap:** Lihat `ADMIN_SETUP.md`
