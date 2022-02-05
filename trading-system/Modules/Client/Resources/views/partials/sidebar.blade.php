@php
    $have_account = \App\Models\Account::where('user_id', auth()->id())->first();
@endphp

<!-- Brand Logo -->
<a href="{{ route('client.index') }}" class="brand-link">
    <img src="{{ asset('public/assets/dashboard') }}/img/logo.png" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">We Earn</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item active">
                <a href="{{ route('client.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('main.dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('client.profile') }}" class="nav-link">
                    <i class="nav-icon far fa-user-circle"></i>
                    <p>
                        {{ __('main.profile') }}
                    </p>
                </a>
            </li>
            @if(auth()->user()->type != 'partner')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-stream"></i>
                    <p>
                        {{ __('main.accounts') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('client.accounts.my') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.my_accounts') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.accounts.real') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('front.new_real_account') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.accounts.demo') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('front.new_demo_account') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.accounts.packages') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('main.open_wallet_account') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('client.documents') }}" class="nav-link">
                    <i class="nav-icon fas fa-id-card-alt"></i>
                    <p>
                        {{ __('main.documents') }}
                    </p>
                </a>
            </li>
            @if(auth()->user()->type != 'partner')
            <li class="nav-item">
                <a href="{{ route('client.deposits') }}" class="nav-link">
                    <i class="nav-icon fas fa-wallet"></i>
                    <p>
                        {{ __('main.deposit_funds') }}
                    </p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('client.withdraw') }}" class="nav-link">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>
                        {{ __('main.withdraw_funds') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('client.transactions') }}" class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        {{ __('main.transaction_history') }}
                    </p>
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('client.referrals') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('main.my_clients') }}
                    </p>
                </a>
            </li>
            {{--
            <li class="nav-item active">
                <a href="{{ route('client.partners') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('main.my_partners') }}
                    </p>
                </a>
            </li>
            --}}
            <li class="nav-item">
                <a href="{{ route('client.service') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        {{ __('main.services') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('client.news') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-reader"></i>
                    <p>
                        {{ __('main.news') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link">
                    <i class="nav-icon far fa-question-circle"></i>
                    <p>
                        {{ __('main.client_support') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('main.Logout') }}
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
