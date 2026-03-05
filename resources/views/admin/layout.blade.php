@extends('layouts.app-admin')

@section('additional-styles')
    <style>
        /* Admin-specific container built on top of premium theme */
        .admin-wrapper {
            display: flex;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0;
            min-height: 100vh;
        }

        .admin-sidebar {
            width: 260px;
            background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
            color: white;
            border-radius: 0;
            padding: 2rem 0;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 15px rgba(2, 132, 199, 0.2);
            overflow-y: auto;
            z-index: 1000;
        }

        .admin-sidebar .brand {
            font-weight: 900;
            font-size: 1.3rem;
            margin: 0 0 2rem 0;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0 1.5rem;
            color: #fff;
        }

        .admin-sidebar .brand i {
            font-size: 1.5rem;
            color: var(--accent);
        }

        .admin-sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            padding: 0 1rem;
        }

        .admin-sidebar a {
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.1rem;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.25s ease;
            font-weight: 500;
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            position: relative;
            border-left: 3px solid transparent;
        }

        .admin-sidebar a i {
            font-size: 1.2rem;
            width: 24px;
            height: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
        }

        .admin-sidebar a:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            padding-left: 1.3rem;
            border-left-color: var(--accent);
        }

        .admin-sidebar a.active {
            background: linear-gradient(90deg, rgba(14, 165, 233, 0.3) 0%, rgba(14, 165, 233, 0.05) 100%);
            color: #fff;
            font-weight: 600;
            border-left-color: var(--accent);
            box-shadow: inset 0 0 20px rgba(14, 165, 233, 0.15);
        }

        .admin-sidebar a.active i {
            color: var(--accent);
        }

        .admin-sidebar hr {
            opacity: 0.1;
            margin: 1.5rem 0;
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .admin-main {
            flex: 1;
            margin-left: 260px;
        }

        .admin-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg, #ffffff 0%, var(--blue-50) 100%);
            border-radius: 16px;
            border: 2px solid rgba(2, 132, 199, 0.15);
            box-shadow: var(--card-shadow);
            margin: 2rem;
            margin-bottom: 2rem;
        }

        .admin-top h2 {
            margin: 0;
            color: var(--blue-900);
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -0.8px;
        }

        .admin-top div {
            color: var(--muted);
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.2px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, var(--blue-50) 100%);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            border: 2px solid rgba(2, 132, 199, 0.15);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--blue-600), var(--accent));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s ease;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, var(--blue-500), transparent);
            opacity: 0.08;
            pointer-events: none;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(2, 132, 199, 0.15);
            border-color: var(--blue-500);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--blue-600);
            margin: 1rem 0 0.5rem;
            position: relative;
            z-index: 1;
        }

        .stat-card .label {
            color: var(--muted);
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
            letter-spacing: 0.2px;
        }

        .stat-card i {
            position: relative;
            z-index: 1;
            display: block;
            margin-bottom: 0.5rem;
        }

        .table-card {
            background: linear-gradient(135deg, #ffffff 0%, var(--blue-50) 100%);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            border: 2px solid rgba(2, 132, 199, 0.15);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .table-card:hover {
            box-shadow: 0 30px 60px rgba(2, 132, 199, 0.15);
            border-color: var(--blue-500);
        }

        @media (max-width: 1024px) {
            .admin-wrapper {
                flex-direction: row;
                gap: 0;
            }

            .admin-sidebar {
                width: 260px;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                z-index: 999;
            }

            .admin-main {
                margin-left: 260px;
                width: calc(100% - 260px);
            }

            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .admin-wrapper {
                flex-direction: column;
                gap: 0;
            }

            .admin-sidebar {
                width: 100%;
                height: auto;
                position: relative;
                left: 0;
                top: 0;
                border-radius: 0;
                padding: 1.5rem 0;
            }

            .admin-sidebar nav {
                flex-direction: row;
                flex-wrap: wrap;
                padding: 0 1rem;
                gap: 0.5rem;
            }

            .admin-sidebar a {
                flex: 1 1 calc(50% - 0.3rem);
                padding: 0.8rem 0.75rem;
                font-size: 0.85rem;
            }

            .admin-sidebar a span {
                display: inline;
            }

            .admin-main {
                margin-left: 0;
                width: 100%;
            }

            .admin-top {
                margin: 1.5rem;
            }

            .stat-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .admin-sidebar nav {
                gap: 0.3rem;
            }

            .admin-sidebar a {
                flex: 1 1 auto;
                padding: 0.75rem 0.5rem;
                font-size: 0.8rem;
            }

            .admin-sidebar a i {
                font-size: 1rem;
            }

            .admin-top {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
                margin: 1rem;
                padding: 1rem;
            }

            .admin-top h2 {
                font-size: 1.5rem;
            }

            .admin-wrapper {
                margin: 0;
                padding: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <div class="brand">
                <i class="bi bi-speedometer2"></i>
                <span>{{ auth()->user()->role === 'petugas' ? 'Petugas Panel' : 'Admin Panel' }}</span>
            </div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" title="Dashboard">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.books.index') }}" class="{{ request()->routeIs('admin.books.*') ? 'active' : '' }}" title="Kelola Buku">
                    <i class="bi bi-book"></i>
                    <span>Kelola Buku</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" title="Kategori">
                    <i class="bi bi-tag"></i>
                    <span>Kategori</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}" title="Data User">
                    <i class="bi bi-people"></i>
                    <span>Data User</span>
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.staff.index') }}" class="{{ request()->routeIs('admin.staff.*') ? 'active' : '' }}" title="Kelola Petugas">
                        <i class="bi bi-person-badge"></i>
                        <span>Kelola Petugas</span>
                    </a>
                @endif
                <a href="{{ route('admin.loans.index') }}" class="{{ request()->routeIs('admin.loans.*') ? 'active' : '' }}" title="Peminjaman">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Peminjaman</span>
                </a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.reports.index') }}" class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" title="Laporan">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Laporan</span>
                    </a>
                @endif
                <a href="{{ route('admin.notifications') }}" class="{{ request()->routeIs('admin.notifications') ? 'active' : '' }}" title="Notifikasi">
                    <i class="bi bi-bell"></i>
                    <span>Notifikasi</span>
                </a>
                <hr>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
            </nav>
        </aside>

        <main class="admin-main">
            <div class="admin-top">
                <h2>@yield('page-title', 'Dashboard Panel')</h2>
                <div>{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @yield('content-admin')
        </main>
    </div>
@endsection

