<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3">
    <div class="container">
        <a class="navbar-brand" href="#">Hello Web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
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
                    <a class="nav-link {{ $active === 'authors' ? 'active' : '' }}" href="/publishers">Publishers</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
