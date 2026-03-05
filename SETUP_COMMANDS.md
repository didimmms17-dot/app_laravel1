# 🔧 Setup Commands - Admin Role System

Kumpulan commands yang diperlukan untuk setup sistem admin.

## 📋 Prerequisites Check

```bash
# Check PHP version (7.4+ required)
php --version

# Check Laravel version
php artisan --version

# Check database connection
php artisan db:show
```

## 🚀 Setup Commands

### Step 1: Run Migrations
```bash
# Run all pending migrations
php artisan migrate

# Run specific migration file
php artisan migrate --path=database/migrations/2026_01_30_000001_create_notifications_table.php

# Rollback last migration (if needed)
php artisan migrate:rollback

# Refresh all migrations
php artisan migrate:refresh
```

### Step 2: Create Admin User

**Option A: Using Artisan Tinker**
```bash
php artisan tinker
```
Then execute:
```php
# Method 1: Using create()
App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash\Hash::make('admin123456'),
    'role' => 'admin'
]);

# Method 2: Factory (if factory exists)
User::factory()->create(['role' => 'admin']);

# Exit tinker
exit
```

**Option B: Using Raw SQL**
```sql
-- MySQL
INSERT INTO users (name, email, password, password_confirmation, role, created_at, updated_at)
VALUES (
    'Admin User',
    'admin@example.com',
    '$2y$10$YOUR_HASHED_PASSWORD_HERE',
    '$2y$10$YOUR_HASHED_PASSWORD_HERE',
    'admin',
    NOW(),
    NOW()
);

-- Get hashed password:
-- Use bcrypt online generator or PHP:
-- echo Hash::make('admin123456');
```

**Option C: Using Seeder**
```bash
# Create seeder
php artisan make:seeder AdminSeeder

# Then run seeder
php artisan db:seed --class=AdminSeeder
```

Example seeder (in database/seeders/AdminSeeder.php):
```php
<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123456'),
            'role' => 'admin'
        ]);
    }
}
```

## 🎯 Useful Commands

### Cache Management
```bash
# Clear all cache
php artisan cache:clear

# Clear config cache
php artisan config:clear

# Clear view cache
php artisan view:clear

# Optimize for production
php artisan optimize
```

### Database
```bash
# Show database info
php artisan db:show

# Show table structure
php artisan db:table users

# Seed database
php artisan db:seed

# Make migration
php artisan make:migration create_table_name

# Make model with migration
php artisan make:model ModelName -m
```

### Routes
```bash
# List all routes
php artisan route:list

# List only admin routes
php artisan route:list | grep admin

# Cache routes (production)
php artisan route:cache

# Clear route cache
php artisan route:clear
```

### Testing
```bash
# Run tests
php artisan test

# Run specific test file
php artisan test tests/Feature/AdminTest.php

# Run test with coverage
php artisan test --coverage
```

### Development
```bash
# Start local server
php artisan serve

# Start with specific port
php artisan serve --port=8080

# Clear IDE helper cache
php artisan clear-parsed

# Publish package configs
php artisan publish --provider="Package\Provider"
```

## 🔍 Verification Commands

### Verify Admin User Created
```bash
php artisan tinker

# Check if user exists
User::where('email', 'admin@example.com')->first();

# Check total admin users
User::where('role', 'admin')->count();

# Exit
exit
```

### Verify Database Tables
```bash
php artisan tinker

# Check if notifications table exists
Schema::hasTable('notifications');

# Check users table has role column
Schema::hasColumn('users', 'role');

# List tables
Schema::getTables();

exit
```

### Verify Routes
```bash
# Check admin routes exist
php artisan route:list | grep "admin"

# Verify middleware
php artisan route:show admin
```

## 🛠️ Troubleshooting Commands

### Reset Everything
```bash
# Full fresh start
php artisan migrate:refresh

# With seeding
php artisan migrate:refresh --seed

# Fresh everything + optimization
php artisan migrate:fresh --seed && php artisan optimize
```

### Check for Issues
```bash
# List all errors
php artisan tinker
dd(Artisan::call('test'));
exit

# Check Laravel installation
php artisan --version
php artisan config:show

# Check database
php artisan db:show
php artisan db:table users
php artisan db:table notifications
```

### Debug Mode
```bash
# Enable debug in .env
APP_DEBUG=true

# Disable for production
APP_DEBUG=false

# Check current environment
php artisan config:show | grep APP_ENV
```

## 📦 Deployment Commands

### Production Setup
```bash
# Install dependencies
composer install --no-dev --optimize-autoloader

# Generate app key (if not done)
php artisan key:generate

# Run migrations
php artisan migrate --force

# Cache everything
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Create storage symlink
php artisan storage:link
```

### Pre-Deployment
```bash
# Test configuration
php artisan config:show

# Verify all routes
php artisan route:list

# Check database connection
php artisan tinker
DB::connection()->getPdo();
exit

# Run tests
composer test
```

## 🔄 Git/Version Control

```bash
# Track admin system files
git add app/Http/Controllers/AdminController.php
git add app/Models/Notification.php
git add database/migrations/2026_01_30_000001_create_notifications_table.php
git add resources/views/admin/
git add routes/web.php
git add app/Providers/AppServiceProvider.php

# Commit
git commit -m "Add complete admin role system with notifications"

# Push
git push origin main
```

## 📋 Full Setup Checklist Commands

```bash
#!/bin/bash

echo "🚀 Admin System Setup"

# 1. Run migrations
echo "1️⃣ Running migrations..."
php artisan migrate

# 2. Create admin user
echo "2️⃣ Creating admin user..."
php artisan tinker <<EOF
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@localhost',
    'password' => Hash\Hash::make('admin123'),
    'role' => 'admin'
]);
exit
EOF

# 3. Clear cache
echo "3️⃣ Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# 4. Optimize
echo "4️⃣ Optimizing..."
php artisan optimize

echo "✅ Setup complete!"
echo "🌐 Access admin panel at: http://localhost:8000/admin"
echo "📧 Email: admin@localhost"
echo "🔐 Password: admin123"
```

Save this as `setup-admin.sh` and run:
```bash
bash setup-admin.sh
```

## 🧪 Testing Commands

```bash
# Test admin access
php artisan tinker
$user = User::where('role', 'admin')->first();
$user->can('create', App\Models\Book::class);  // Should return true (if using policies)
exit

# Test notifications
php artisan tinker
$notif = App\Models\Notification::first();
$notif->isRead();  // Should return boolean
exit
```

---

## 📚 Reference

- Laravel Docs: https://laravel.com/docs
- Artisan Commands: https://laravel.com/docs/artisan
- Migration Docs: https://laravel.com/docs/migrations
- Blade Templates: https://laravel.com/docs/blade

---

**Generated:** Jan 30, 2026
**Status:** Ready to use
