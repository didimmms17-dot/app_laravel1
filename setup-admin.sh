#!/usr/bin/env bash

# ADMIN ROLE SETUP SCRIPT
# Script ini membantu setup admin role pada aplikasi Laravel

echo "================================"
echo "  LIBRARY ADMIN SETUP"
echo "================================"
echo ""

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo "❌ Error: artisan file not found. Please run this script from the project root directory."
    exit 1
fi

echo "✓ Found artisan file"
echo ""

# Step 1: Run migrations
echo "Step 1: Running migrations..."
php artisan migrate

if [ $? -eq 0 ]; then
    echo "✓ Migrations completed successfully"
else
    echo "❌ Migration failed. Please check the error message above."
    exit 1
fi

echo ""
echo "================================"
echo "  SETUP COMPLETE!"
echo "================================"
echo ""
echo "Next steps:"
echo "1. Create an admin user (use php artisan tinker or update database)"
echo "2. Access admin panel at: http://localhost:8000/admin"
echo "3. Login with your admin user credentials"
echo ""
echo "For more information, see ADMIN_SETUP.md"
echo ""
