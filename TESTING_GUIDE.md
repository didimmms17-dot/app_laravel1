# 🧪 Admin Role - Testing & Validation Guide

## Pre-Testing Requirements

- [ ] Laravel application berjalan
- [ ] Database sudah di-setup
- [ ] Migration sudah dijalankan: `php artisan migrate`
- [ ] Admin user sudah dibuat

---

## ✅ Testing Checklist

### 1. Setup & Initial Access

#### Test 1.1: Migration Success
```bash
php artisan migrate
```
**Expected:** No errors, tables created including `notifications`

#### Test 1.2: Admin User Creation
```bash
php artisan tinker
```
```php
$user = App\Models\User::create([
    'name' => 'Admin Test',
    'email' => 'admin@test.local',
    'password' => Hash\Hash::make('test123'),
    'role' => 'admin'
]);
```
**Expected:** User created with role 'admin'

#### Test 1.3: Admin Panel Access
- Navigate to: `http://localhost:8000/admin`
- Login with admin credentials
**Expected:** Redirected to admin dashboard, no errors

---

### 2. Dashboard Testing

#### Test 2.1: Dashboard Display
- URL: `/admin`
**Expected:**
- [ ] Dashboard title displays
- [ ] 4 stat cards visible (Users, Books, Loans, Notifications)
- [ ] Stats show correct counts
- [ ] Quick action buttons present

#### Test 2.2: Notification Badge
**Expected:**
- [ ] Bell icon shows in top-right
- [ ] Badge shows unread notification count
- [ ] Badge only shows if unread > 0

---

### 3. Users Management CRUD

#### Test 3.1: View Users List
- URL: `/admin/users`
**Expected:**
- [ ] Table displays all users
- [ ] Pagination works
- [ ] Edit and Delete buttons present

#### Test 3.2: Create User
- URL: `/admin/users/create`
- Fill form with:
  - Name: "John Doe"
  - Email: "john@example.com"
  - Password: "password123"
  - Role: "member"
- Click "Create User"
**Expected:**
- [ ] Form validates email is unique
- [ ] Success message shown
- [ ] Redirected to users list
- [ ] New user appears in list

#### Test 3.3: Create User Validation
- Try creating user with:
  - Empty name
  - Invalid email
  - Password < 8 characters
  - Duplicate email
**Expected:**
- [ ] Form shows validation errors
- [ ] User not created

#### Test 3.4: Edit User
- Click edit on a user
- Change name to "Jane Smith"
- Change role to "librarian"
- Click "Update User"
**Expected:**
- [ ] Changes saved
- [ ] Success message shown
- [ ] Updated data shows in list

#### Test 3.5: Delete User
- Click delete on a user
- Confirm deletion
**Expected:**
- [ ] Confirmation modal appears
- [ ] User deleted from database
- [ ] Removed from list
- [ ] Success message shown

#### Test 3.6: Cannot Delete Self
- Login as admin
- Try to delete the current admin user
**Expected:**
- [ ] Error message: "Tidak bisa menghapus user yang sedang login"
- [ ] User still in database

---

### 4. Books Management CRUD

#### Test 4.1: View Books List
- URL: `/admin/books`
**Expected:**
- [ ] Table shows all books
- [ ] Displays: title, author, ISBN, category, quantity
- [ ] Edit and Delete buttons

#### Test 4.2: Create Book
- URL: `/admin/books/create`
- Fill form:
  - Title: "Laravel Best Practices"
  - Author: "John Smith"
  - ISBN: "978-0-1234-5678-9"
  - Category: (select any)
  - Quantity: "5"
- Click "Create Book"
**Expected:**
- [ ] Form validates ISBN is unique
- [ ] Success message
- [ ] Book appears in list

#### Test 4.3: Edit Book
- Click edit on a book
- Change quantity to "10"
- Click "Update Book"
**Expected:**
- [ ] Changes saved
- [ ] Success message
- [ ] Updated quantity shown in list

#### Test 4.4: Delete Book
- Click delete on a book
- Confirm
**Expected:**
- [ ] Book deleted
- [ ] Removed from list

---

### 5. Loans Management

#### Test 5.1: View Loans List
- URL: `/admin/loans`
**Expected:**
- [ ] Shows all loans
- [ ] Status badges displayed with colors
- [ ] View button present

#### Test 5.2: View Loan Details
- Click "View" on any loan
**Expected:**
- [ ] Loan details displayed
- [ ] Borrower info shown
- [ ] Book info shown
- [ ] Loan dates shown
- [ ] Status clearly indicated

#### Test 5.3: Approve Pending Loan
- Find a loan with "pending" status
- Click "Approve Loan" button
**Expected:**
- [ ] Status changes to "approved"
- [ ] Success message shown
- [ ] Borrower receives notification

#### Test 5.4: Reject Loan
- Find pending loan
- Click "Reject Loan"
- Enter rejection reason: "Book not available"
- Click "Reject Loan" in modal
**Expected:**
- [ ] Status changes to "rejected"
- [ ] Success message
- [ ] Borrower notified with reason

#### Test 5.5: Mark Loan as Returned
- Find approved loan
- Click "Mark as Returned"
**Expected:**
- [ ] Status changes to "returned"
- [ ] Return date populated
- [ ] Success message

---

### 6. Notifications System

#### Test 6.1: View Notifications List
- URL: `/admin/notifications`
**Expected:**
- [ ] All notifications displayed
- [ ] Type badge shown (loan_request, loan_approved, etc)
- [ ] Read/Unread status indicated
- [ ] Created date shown

#### Test 6.2: View Notification Detail
- Click "View" on any notification
**Expected:**
- [ ] Notification title shown
- [ ] Full message displayed
- [ ] Borrower info shown
- [ ] Related loan link (if available)
- [ ] Option to mark as read

#### Test 6.3: Mark Notification as Read
- Open unread notification
- Click "Mark as Read"
**Expected:**
- [ ] Notification marked as read
- [ ] Badge status updates
- [ ] Success message
- [ ] Notification list updates

#### Test 6.4: Delete Notification
- Click delete icon on notification
**Expected:**
- [ ] Confirmation requested
- [ ] Notification deleted
- [ ] Removed from list

#### Test 6.5: Clear All Notifications
- In notifications list
- Click "Clear All" button
**Expected:**
- [ ] Confirmation modal
- [ ] All notifications deleted
- [ ] List becomes empty
- [ ] Badge disappears from bell icon

---

### 7. Notification Auto-Generation

#### Test 7.1: Loan Request Notification
- Login as **member** user
- Go to `/books` (public page)
- Click "Pinjam" (request loan)
- Logout and login as **admin**
- Go to `/admin/notifications`
**Expected:**
- [ ] New notification appears
- [ ] Type: "loan_request"
- [ ] Message: "[Member Name] mengajukan permintaan peminjaman buku [Book Title]"
- [ ] Notification shows as "Unread"
- [ ] Related loan is linked

#### Test 7.2: Loan Approval Notification to Member
- Admin approves a loan
- Member logout/login
- Check member's notification area (if exists)
**Expected:**
- [ ] Member receives notification about approval
- [ ] Message: "Peminjaman buku [Book Title] telah disetujui"

#### Test 7.3: Loan Rejection Notification to Member
- Admin rejects a loan with reason
- Member checks notifications
**Expected:**
- [ ] Member notified about rejection
- [ ] Message includes rejection reason

#### Test 7.4: Loan Return Notification
- Admin marks loan as returned
- Check notifications
**Expected:**
- [ ] New notification created
- [ ] Type: "loan_returned"
- [ ] Message: "Pengembalian buku [Book Title] telah dicatat"

---

### 8. Security Testing

#### Test 8.1: Access Control - Member Cannot Access Admin
- Login as member user
- Try to access `/admin` directly
**Expected:**
- [ ] 403 Forbidden error
- [ ] Redirected away

#### Test 8.2: Access Control - Guest Cannot Access Admin
- Logout completely
- Try to access `/admin`
**Expected:**
- [ ] Redirected to login page

#### Test 8.3: CSRF Protection
- Try to submit form without CSRF token
**Expected:**
- [ ] 419 CSRF token mismatch error

#### Test 8.4: SQL Injection Prevention
- Try to inject SQL in form fields
  - Example: `test'; DROP TABLE users;--`
**Expected:**
- [ ] Input escaped properly
- [ ] No SQL errors
- [ ] Data stored safely

#### Test 8.5: Input Validation
- Try invalid inputs:
  - Very long strings (>255 chars)
  - Special characters in email
  - Negative numbers in quantity
**Expected:**
- [ ] Validation errors shown
- [ ] Invalid data rejected

---

### 9. UI/UX Testing

#### Test 9.1: Responsive Design
- Access admin panel on different devices:
  - Desktop (1920px)
  - Tablet (768px)
  - Mobile (375px)
**Expected:**
- [ ] Layout adapts properly
- [ ] Sidebar collapses on mobile
- [ ] Tables responsive
- [ ] Buttons clickable

#### Test 9.2: Navigation
- Test sidebar menu:
  - Dashboard link
  - Users link
  - Books link
  - Loans link
  - Notifications link
  - Logout link
**Expected:**
- [ ] All links work
- [ ] Active link highlighted
- [ ] No broken links

#### Test 9.3: Flash Messages
- Perform create/update/delete action
**Expected:**
- [ ] Success message appears
- [ ] Message auto-dismisses or has close button
- [ ] Message styling is clear

#### Test 9.4: Pagination
- Go to users list with many users
**Expected:**
- [ ] Pagination controls visible
- [ ] Can navigate between pages
- [ ] Correct data on each page

#### Test 9.5: Tables
- Check all tables:
  - Hover effect on rows
  - Sortable headers (if implemented)
  - Overflow handling for long text
**Expected:**
- [ ] Good visual presentation
- [ ] Data readable

---

### 10. Performance Testing

#### Test 10.1: Load Time
- Access `/admin`
- Check browser dev tools → Network tab
**Expected:**
- [ ] Page loads in < 2 seconds
- [ ] No 404 errors for assets

#### Test 10.2: Large Dataset
- Create 1000+ users/books/loans in database
- Access list pages
**Expected:**
- [ ] Pagination works smoothly
- [ ] No timeout errors
- [ ] Queries optimized (use eager loading)

---

## 🔍 Manual Testing Scenarios

### Scenario 1: Complete Loan Workflow
1. Login as member → Request loan → Logout
2. Login as admin → See notification → View detail → Approve
3. Member receives approval notification
4. Member returns book
5. Admin marks as returned
6. Check notification history

### Scenario 2: User Management Workflow
1. Admin creates new user
2. View user in list
3. Edit user details
4. Delete user (if not used)
5. Verify changes in database

### Scenario 3: Multi-Admin Test
1. Create 2 admin users
2. Admin 1 approves loan → Notification visible to admin 1
3. Admin 2 can also see notification in /admin/notifications
4. Both admins can manage same loans

---

## 📋 Test Results Template

```
Test Name: _______________
Date: _______________
Tester: _______________

[x] Passed
[ ] Failed
[ ] Blocked

Notes:
_______________________
_______________________

Expected vs Actual:
_______________________
_______________________
```

---

## ✅ Sign-Off

- [ ] All tests passed
- [ ] No critical bugs found
- [ ] Performance acceptable
- [ ] Security verified
- [ ] Ready for production

---

**Date Tested:** __________
**Tested By:** __________
**Status:** ✅ READY / ❌ NEEDS FIXES

