<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/" class="navbar-brand navbar-brand-autodark">
            <h2 class="font-weight-bold text-azure">We<span class="text-red">Learn</span></h2>
        </a>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{ Auth::user()->avatar }})"></span>
                    <div class="d-none d-xl-block pl-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ Auth::user()->name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon dropdown-item-icon icon-tabler icon-tabler-layout-dashboard" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                            <line x1="12" y1="4" x2="12" y2="12"></line>
                        </svg>
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                @role('admin|instructor')
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v8h-6z"></path>
                                    <path d="M4 16h6v4h-6z"></path>
                                    <path d="M14 12h6v8h-6z"></path>
                                    <path d="M14 4h6v4h-6z"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">Master Data</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.tags*') ? 'active' : '' }}"
                            href="{{ route('admin.tags.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tags"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z">
                                    </path>
                                    <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                                    <path d="M6 9h-.01"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Tags
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.series*') ? 'active' : '' }}"
                            href="{{ route('admin.series.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-playlist"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="14" cy="17" r="3"></circle>
                                    <path d="M17 17v-13h4"></path>
                                    <path d="M13 5h-10"></path>
                                    <line x1="3" y1="9" x2="13" y2="9"></line>
                                    <path d="M9 13h-6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Series
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">User Management</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.roles*') ? 'active' : '' }}"
                            href="{{ route('admin.roles.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-accessible"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path>
                                    <circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Roles
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.permissions*') ? 'active' : '' }}"
                            href="{{ route('admin.permissions.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-lock"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3">
                                    </path>
                                    <circle cx="12" cy="11" r="1"></circle>
                                    <line x1="12" y1="12" x2="12" y2="14.5"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Permissions
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.users*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Users
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">Transaction</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.transactions*') ? 'active' : '' }}"
                            href="{{ route('admin.transactions.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="7" y="9" width="14" height="10" rx="2">
                                    </rect>
                                    <circle cx="14" cy="14" r="2"></circle>
                                    <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Transactions
                            </span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('member.dashboard') ? 'active' : '' }}"
                            href="{{ route('member.dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v8h-6z"></path>
                                    <path d="M4 16h6v4h-6z"></path>
                                    <path d="M14 12h6v8h-6z"></path>
                                    <path d="M14 4h6v4h-6z"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">Learning</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('member.series*') ? 'active' : '' }}"
                            href="{{ route('member.series.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-playlist"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="14" cy="17" r="3"></circle>
                                    <path d="M17 17v-13h4"></path>
                                    <path d="M13 5h-10"></path>
                                    <line x1="3" y1="9" x2="13" y2="9"></line>
                                    <path d="M9 13h-6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                My Series
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">Transaction</div>
                    <li class="nav-item">
                        <a class="nav-link" {{ Route::is('member.transactions*') ? 'active' : '' }}
                            href="{{ route('member.transactions.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="7" y="9" width="14" height="10" rx="2">
                                    </rect>
                                    <circle cx="14" cy="14" r="2"></circle>
                                    <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Transactions
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-3">Settings</div>
                    <li class="nav-item">
                        <a class="nav-link" {{ Route::is('member.profile*') ? 'active' : '' }}
                            href="{{ route('member.profile.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Profile
                            </span>
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</aside>
