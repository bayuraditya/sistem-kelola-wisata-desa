<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belalang Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        *{
            font-family: "Inter", sans-serif;
        }
    </style>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-transparent py-3">
        <div class="container">
            <a class="navbar-brand text-dark" href="/" id="brand-name">Belalang Tourism</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-secondary" href="/destinations">Destination</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="/galleries">Galleries</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="/contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="/about-us">About Us</a></li>
                    @auth
                        <li class="nav-item dropdown ms-3">
                            <a class="btn btn-success dropdown-toggle " href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="/admin">Dashboard</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-success text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .navbar {
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out, padding 0.3s ease-in-out;
        }
        .navbar-transparent {
            background-color: transparent !important;
            box-shadow: none;
            padding: 20px 0;
        }
        .navbar-solid {
            background-color: white !important;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        .navbar-nav .nav-link {
            color: #4a4a4a !important;
            transition: color 0.3s ease-in-out;
            position: relative;
            margin-right: 15px;
        }
        .navbar-nav .nav-link::after {
            content: "";
            display: block;
            width: 0;
            height: 2px;
            background: black;
            transition: width 0.3s ease-in-out;
            position: absolute;
            bottom: -2px;
            left: 0;
        }
        .navbar-nav .nav-link:hover {
            color: black !important;
        }
        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }
        .btn-success {
            text-decoration: none !important;
        }
        .navbar-brand {
            transition: color 0.3s ease-in-out;
        }
        .navbar-brand:hover {
            color: black !important;
        }
    </style>
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-solid');
            } else {
                navbar.classList.remove('navbar-solid');
                navbar.classList.add('navbar-transparent');
            }
        });
    </script>
    @yield('content')
 
    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3">
        <p>&copy; 2025 Belalang Tourism. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>
