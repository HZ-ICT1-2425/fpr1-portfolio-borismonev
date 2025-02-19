<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item {{ Request::route()->getName() === '/' ? 'is-active' : '' }}">
                <i class="fa-solid fa-house"></i>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a href="/profile"
                   class="navbar-item {{ Request::route()->getName() === 'profile' ? 'is-active' : '' }}">Profile</a>
                <a href="/dashboard"
                   class="navbar-item {{ Request::route()->getName() === 'dashboard' ? 'is-active' : '' }}">Dashboard</a>
                <a href="/faq"
                   class="navbar-item {{ Request::route()->getName() === 'faq.index' ? 'is-active' : '' }}">FAQ</a>
                <a href="/blog"
                   class="navbar-item {{ Request::route()->getName() === 'blog.index' ? 'is-active' : '' }}">Blog</a>
            </div>
        </div>
    </div>
</nav>
