<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth')</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen',
                'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue',
                sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6fa;
        }
    </style>
</head>
<body style="background:#f4f6fa;min-height:100vh;">
    <main>
        @yield('content')
    </main>
</body>
</html>
