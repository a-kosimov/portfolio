<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'NeftProd')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            padding-top: 70px;
        }
    </style>

    @stack('styles')

    @push('styles')
        <style>
            .pagination {
                justify-content: center;
                font-size: 0.9rem;
            }
            .pagination .page-link {
                padding: 0.3rem 0.6rem;
                min-width: 2.2rem;
            }
        </style>
    @endpush
</head>
<body>

<!-- Навигация -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="NeftProd Logo" height="40" class="me-2" />
            <span>НефтеПродуктТехника</span>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Продукция</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">О компании</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Контакты</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Контент страницы -->
<main class="container mt-4">
    @yield('content')
</main>

<!-- Футер -->
<footer class="bg-dark text-light py-4 mt-5">
    <div class="container text-center">
        <small>&copy; {{ date('Y') }} Нефтепродукттехника. Все права защищены.</small>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
