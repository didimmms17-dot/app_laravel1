<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('welcome');
    }
}
