<!-- Brand Logo -->
<a href="{{ route('dashboard.index') }}" class="brand-link">
    <img src="{{ asset('public/assets/dashboard') }}/img/logo.png" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">We Earn</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('main.dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('accounts.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-circle"></i>
                    <p>{{ __('main.accounts') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('documents.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-id-card-alt"></i>
                    <p>{{ __('main.documents') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-image"></i>
                    <p>
                        {{ __('main.ads') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('ads.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ads.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>
                        {{ __('main.courses') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('courses.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-id-card-alt"></i>
                    <p>{{ __('main.orders') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>
                        {{ __('main.education') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('education.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('education.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>
                        {{ __('main.news') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('posts.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        {{ __('main.slider') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('slider.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        {{ __('main.services') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('services.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        {{ __('main.PRODUCTS') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('items.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('items.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>
                        {{ __('main.pages') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pages.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        {{ __('main.team') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('team.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('team.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('main.users') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.users1') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}?t=2" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.users2') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}?t=3" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.users3') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.add') }}</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('programs.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>{{ __('main.programs') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('countries.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>{{ __('main.countries') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('typeAccounts.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>{{ __('main.Type_Account') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('packages.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>{{ __('main.packages') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('languages.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-language"></i>
                    <p>{{ __('main.languages') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('features.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('main.features') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link"> 
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('main.Logout') }}
                </a>
                <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
