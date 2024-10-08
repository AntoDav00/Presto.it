<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow navbarCustom py-2 position-sticky top-0 z-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand ms-2" href="{{ route('homepage') }}"><img src="{{ asset('img/LOGOpresto.png') }}"
                alt="Presto.it"></a>
        <div class="d-flex align-items-center">
            <!-- Language Selector -->
            <div class="language-selector me-3">
                <div class="dropdown d-none d-md-block">
                    <button class="btn  dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-globe"></i> {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li><x-_locale Lang="it"
                            class="dropdown-item d-flex align-items-center">Italiano</x-_locale>
                        </li>
                        <li>
                            <x-_locale Lang="en"
                                class="dropdown-item d-flex align-items-center">English</x-_locale>
                        </li>
                        <li><x-_locale Lang="es"
                                class="dropdown-item d-flex align-items-center">Español</x-_locale>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Search form and other elements -->
            <form class="me-2 d-none d-md-block" role="search" action="{{ route('article.searched') }}" method="GET">
                <div class="search-input-wrapper">
                    <input class="form-control form-control-sm rounded-pill py-1 pe-4 ps-2 search-input"
                        style="width: 150px;" placeholder="{{ __('ui.search') }}..." aria-label="Search" name="query">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                        class="bi bi-search search-icon" viewBox="0 0 16 16" style="right: 8px; top: 50%;"
                        onclick="this.closest('form').submit();">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
            </form>
            <a href="{{ route('create') }}" class="py-1 px-2 btn log-in-button rounded-pill px-3 mx-3">{{ __('ui.sell') }}</a>
            <button class="navbar-toggler border-0" type="button" id="menuToggle" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    @auth
                        @if (\App\Models\Article::toBeRevisedCount() > 0 && Auth::user()->is_revisor)
                            <i class="fas fa-solid fa-circle position-absolute top-0 end-5" style="color: #ff0000;"></i>
                        @endif
                    @endauth
                </div>
            </button>
        </div>
    </div>
</nav>

<!-- Full-screen Overlay Menu -->
<div id="overlayMenu" class="overlay-menu">
    <div class="overlay-content">
        <button class="close-btn" id="closeMenu">
            <div class="close-icon">
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="rounded-4 language-selector me-2 mt-5 glassmorphism d-md-none">
            <div class="accordion" id="languageAccordion">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header" id="languageHeader">
                        <button class=" accordion-button collapsed p-0 bg-transparent" type="button" data-bs-toggle="collapse"
                            data-bs-target="#languageCollapse" aria-expanded="false" aria-controls="languageCollapse">
                            <i class="fas fa-globe me-2"></i> {{ strtoupper(app()->getLocale()) }}
                        </button>
                    </h2>
                    <div id="languageCollapse" class="accordion-collapse collapse" aria-labelledby="languageHeader"
                        data-bs-parent="#languageAccordion">
                        <div class="accordion-body p-0 mt-2">
                            <ul class="list-unstyled">
                                <li><x-_locale Lang="it" class="d-block py-1">Italiano</x-_locale></li>
                                <li><x-_locale Lang="en" class="d-block py-1">English</x-_locale></li>
                                <li><x-_locale Lang="es" class="d-block py-1">Español</x-_locale></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form class="overlay-search  d-md-none mb-4" role="search" action="{{ route('article.searched') }}"
            method="GET">
            <div class="search-input-wrapper">
                <input class=" searchMobile form-control rounded-4 py-1 pe-4 ps-2 search-input" placeholder="{{ __('ui.search') }}..."
                    aria-label="Search" name="query">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                    class="bi bi-search search-icon" viewBox="0 0 16 16" onclick="this.closest('form').submit();">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </div>
        </form>
        <ul class="menu-items">
            <li><a href="{{ route('homepage') }}">{{ __('ui.home') }}</a></li>
            <li><a href="{{ route('products') }}">{{ __('ui.products') }}</a></li>
            <li class="nav-item position-relative">
                <a class="nav-link" href="{{ route('wishlist.index') }}">
                    {{ __('ui.wishlist') }}
                </a>
            </li>
            @auth
                @if (Auth::user()->is_revisor)
                    <li class="position-relative"><a href="{{ route('revisor.index') }}">{{ __('ui.revisorZone') }}</a>
                        @if (\App\Models\Article::toBeRevisedCount() > 0)
                            <span
                                class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        @endif
                    </li>
                @endif
            @endauth
            @guest
                <li><a href="{{ route('work.revisor') }}">{{ __('ui.workWithUs') }}</a></li>
            @else
                @if (!Auth::user()->is_revisor)
                    <li><a href="{{ route('work.revisor') }}">{{ __('ui.workWithUs') }}</a></li>
                @endif
            @endguest
            @auth
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user-circle me-1"></i>
                        <span class="text-capitalize">{{ Auth::user()->name }}</span>
                    </a>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1"></i>
                        <span>{{ __('ui.login') }}</span>
                    </a>
                </li>
            @endguest
            <hr>
            @auth
                <li>
                    <button class="btn btn-outline-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('ui.logout') }}
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</div>
