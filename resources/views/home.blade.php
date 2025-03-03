<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belalang Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url('https://plus.unsplash.com/premium_photo-1729070677283-c16a03fe5287?q=80&w=2128&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            text-align: center;
            padding: 20px;
        }
        .navbar {
            transition: background-color 0.3s;
        }
        .navbar-transparent {
            background-color: transparent !important;
        }
        .navbar-solid {
            background-color: rgba(40, 167, 69, 0.9) !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            font-weight: bold;
            color: #f8f9fa !important;
        }
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark navbar-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Belalang Tourism</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#destinasi">Destination</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">About Us</a></li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a class="nav-link btn btn-success text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to Belalang </h1>
    </div>

    <!-- Destinasi Wisata -->
    <section id="destinasi" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tourist Destination </h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1523952578875-e6bb18b26645?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjZ8fGJhbGl8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="Hutan Wisata">
                        <div class="card-body">
                            <h5 class="card-title">Hutan Wisata</h5>
                            <p class="card-text">Hutan yang indah dengan udara segar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?w=600&auto=format&fit=crop&q=60" class="card-img-top" alt="Pantai Eksotis">
                        <div class="card-body">
                            <h5 class="card-title">Pantai Eksotis</h5>
                            <p class="card-text">Pantai dengan pasir putih dan ombak tenang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1564981447395-903d78d49a28?w=600&auto=format&fit=crop&q=60" class="card-img-top" alt="Air Terjun">
                        <div class="card-body">
                            <h5 class="card-title">Air Terjun</h5>
                            <p class="card-text">Keindahan air terjun alami yang menakjubkan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact</h2>
            <p class="text-center">Contact us for more information.</p>
            <div class="text-center">
                <a href="#" class="btn btn-success">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3">
        <p>&copy; 2025 Belalang Tourism. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
