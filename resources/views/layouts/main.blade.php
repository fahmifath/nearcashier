<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NearCashier') - NearCashier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Global Styles */
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 10px 15px rgba(0, 0, 0, 0.1), 0 25px 35px rgba(0, 0, 0, 0.05);
        }

        /* Sidebar Layout for Dashboard */
        @media (min-width: 1024px) {
            body.with-navbar-sidebar {
                padding-left: 16rem;
            }
        }

        body.with-navbar-sidebar .main-content {
            margin-top: 4rem;
            min-height: calc(100vh - 4rem);
            padding: 1.5rem;
        }

        /* Hide navbar and sidebar for auth pages */
        body.auth-page .navbar,
        body.auth-page .sidebar,
        body.auth-page #sidebarOverlay {
            display: none !important;
        }

        @yield('styles')
    </style>
</head>

<body class="bg-gray-50 m-0 p-0">
    @include('components.navbar')
    @include('components.sidebar')

    <script>
        document.body.classList.add('with-navbar-sidebar');
    </script>
    <div class="main-content">
        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>