<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Perpustakaan Digital')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css">
    <style>
        /* Color Palette - Premium Blue Theme */
        :root {
            --blue-50: #f0f9ff;
            --blue-100: #e0f2fe;
            --blue-200: #bae6fd;
            --blue-300: #7dd3fc;
            --blue-400: #38bdf8;
            --blue-500: #0ea5e9;
            --blue-600: #0284c7;
            --blue-700: #0369a1;
            --blue-800: #075985;
            --blue-900: #0c2d6b;
            --blue-950: #082f49;
            --accent: #0ea5e9;
            --accent-light: #7dd3fc;
            --muted: #64748b;
            --card-shadow: 0 10px 30px rgba(2, 132, 199, 0.08);
            --card-shadow-lg: 0 20px 50px rgba(2, 132, 199, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--blue-900);
            background: linear-gradient(135deg, var(--blue-50) 0%, var(--blue-100) 50%, var(--blue-200) 100%);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Alert Styles */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
            animation: fadeInDown 0.4s ease;
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: #b91c1c;
            border-left-color: #ef4444;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.1);
            color: #16a34a;
            border-left-color: #22c55e;
        }

        .alert ul {
            margin-left: 1.25rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 700;
            color: var(--blue-900);
            font-size: 0.95rem;
            letter-spacing: 0.2px;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1.1rem;
            border: 2px solid rgba(2, 132, 199, 0.2);
            border-radius: 12px;
            font-size: 0.95rem;
            font-family: inherit;
            background: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--blue-600);
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.15);
            background: #ffffff;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 0.35rem;
            display: block;
            font-weight: 500;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 0.85rem 1.75rem;
            border-radius: 12px;
            border: 0;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--blue-600) 0%, var(--blue-500) 50%, var(--accent) 100%);
            color: white;
            box-shadow: 0 12px 35px rgba(2, 132, 199, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.25);
            transition: left 0.5s ease;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(2, 132, 199, 0.4);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-outline-primary {
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.1), rgba(2, 132, 199, 0.05));
            color: var(--blue-700);
            border: 2px solid var(--blue-600);
            padding: 0.75rem 1.5rem;
        }

        .btn-outline-primary:hover {
            background: var(--blue-600);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(2, 132, 199, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, rgba(100, 116, 139, 0.1), rgba(100, 116, 139, 0.05));
            color: var(--muted);
            border: 2px solid var(--muted);
            padding: 0.75rem 1.5rem;
        }

        .btn-secondary:hover {
            background: var(--muted);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(100, 116, 139, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 50%);
            color: white;
            box-shadow: 0 12px 35px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%);
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(239, 68, 68, 0.4);
        }

        .btn.w-100 {
            width: 100%;
        }

        .btn.mb-2 {
            margin-bottom: 0.5rem;
        }

        .btn-group {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        table th {
            background: linear-gradient(135deg, var(--blue-50) 0%, var(--blue-100) 100%);
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 700;
            color: var(--blue-900);
            border-bottom: 2px solid var(--blue-200);
            font-size: 0.95rem;
            letter-spacing: 0.3px;
        }

        table td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--blue-100);
            color: var(--blue-800);
        }

        table tbody tr {
            transition: all 0.3s ease;
        }

        table tbody tr:hover {
            background-color: var(--blue-50);
            box-shadow: inset 0 0 15px rgba(2, 132, 199, 0.05);
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 0.7rem 1.1rem;
            border-radius: 10px;
            border: 2px solid rgba(2, 132, 199, 0.25);
            text-decoration: none;
            font-weight: 700;
            color: var(--blue-700);
            background: rgba(2, 132, 199, 0.05);
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
        }

        .pagination a {
            color: var(--blue-600);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), var(--blue-50));
        }

        .pagination a:hover {
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            color: #fff;
            transform: translateY(-3px);
            border-color: var(--blue-500);
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.25);
        }

        .pagination .active span {
            background: linear-gradient(135deg, var(--blue-600), var(--blue-500));
            color: #fff;
            border-color: var(--blue-500);
            font-weight: 900;
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.25);
        }

        /* Card Styles */
        .card {
            background: linear-gradient(135deg, #ffffff 0%, var(--blue-50) 100%);
            border-radius: 16px;
            border: 2px solid rgba(2, 132, 199, 0.15);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card::before {
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

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 30px 60px rgba(2, 132, 199, 0.15);
            border-color: var(--blue-500);
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.05) 0%, rgba(2, 132, 199, 0.03) 100%);
            padding: 1.25rem;
            border-bottom: 2px solid rgba(2, 132, 199, 0.1);
        }

        .card-header h5 {
            margin: 0;
            color: var(--blue-900);
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 0.2px;
        }

        .card-body {
            padding: 1.5rem;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .w-100 {
            width: 100%;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert {
            animation: fadeInDown 0.4s ease;
        }

        /* Utility Classes */
        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: var(--muted);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .btn {
                padding: 0.7rem 1.25rem;
                font-size: 0.9rem;
            }

            table {
                font-size: 0.9rem;
            }

            table th,
            table td {
                padding: 0.75rem;
            }
        }

        @yield('additional-styles')
    </style>
</head>
<body>
    @yield('content')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.3s ease';
                    setTimeout(() => alert.remove(), 300);
                }, 4000);
            });
        });
    </script>
</body>
</html>
