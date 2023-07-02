<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
    <div class="container">
        <a class="navbar-brand" href="#">Book Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    @can('writer')
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'mybooks' ? 'active' : '' }}" href="/mybooks">My Books</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'books' ? 'active' : '' }}" href="/books">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'authors' ? 'active' : '' }}" href="/authors">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'publishers' ? 'active' : '' }}" href="/publishers">Publishers</a>
                    </li>
                </ul>
            @endauth
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/home"><i class="bi bi-person-circle"></i> Home </a></li>
                            @can('writer')
                                <li><a class="dropdown-item" href="/mybooks"><i class="bi bi-layout-text-window-reverse"></i> My Post</a></li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
