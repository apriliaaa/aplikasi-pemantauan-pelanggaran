<nav x-data="{ open: false }" class=" border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
    <x-jet-application-mark class="block h-9 w-auto" />
    </a>
    </div>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-jet-nav-link>
    </div>
    </div>

    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <div class="w-60">
                        <!-- Team Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-jet-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            {{ __('Create New Team') }}
                        </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" />
                        @endforeach
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>
        @endif

        <!-- Settings Dropdown -->
        <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button
                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </button>
                    @else
                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                    :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>
                @endcan

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
                @endif
            </div>
        </div>
    </div> --}}

    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-center">
                    {{-- <div class="logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div> --}}

                    <!-- menu profile quick info -->
                    <div class="text-center">
                        <div class="img-fluid rounded-circle">
                            <a href="index.html"><img class="w-50 h-50" src="/image/Photos.png" alt="" srcset=""></a>
                        </div>
                        <h6 class="text-capitalize mt-4">Hello {{ Auth::user()->name }}</h6>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>


                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    {{-- <li class="sidebar-title">Menu</li> --}}

                    <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="true">
                        {{-- <li class="sidebar-item {{ (request()->is('/dashboard')) ? 'active' : 'active' }}"> --}}
                        {{-- <li class="sidebar-item" {{ (strpos(Route::currentRouteName(), 'dashboard')==0) ? 'active' : 'active' }}>
                        --}}
                        <a href="{{ route('dashboard') }}" class='sidebar-link'>
                            {{-- <i class="bi bi-grid-fill"></i> --}}
                            <i class="fa-solid fa-gauge"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    @if (auth()->user()->role === "SuperAdmin")
                    {{-- @can('manage-admin') --}}
                    <li class="sidebar-item  has-sub {{ Request::segment(1) === 'admin' ? 'active' : ''}}"
                        aria-current="true">
                        <a href="#" class='sidebar-link'>
                            {{-- <i class="bi bi-stack"></i> --}}
                            <i class="fa-solid fa-user-tie"></i>
                            <span>Admin</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::routeIs('admin.create') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{route('admin.create')}}">Input Admin</a>
                            </li>
                            <li class="submenu-item {{ Request::routeIs('admin.data') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('admin.data') }}">Data Admin</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if (auth()->user()->role != "Dosen")
                    <li class="sidebar-item  has-sub {{ Request::segment(1) === 'dosen' ? 'active' : '' }}"
                        aria-current="true">
                        <a href="#" class='sidebar-link'>
                            {{-- <i class="bi bi-collection-fill"></i> --}}
                            <i class="fa-solid fa-user"></i>
                            <span>Dosen</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::routeIs('dosen.create') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('dosen.create') }}">Input Dosen</a>
                            </li>
                            <li class="submenu-item {{ Request::routeIs('dosen.data') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('dosen.data') }}">Data Dosen</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    {{-- @endif --}}

                    <li class="sidebar-item {{ Request::routeIs('prodi') ? 'active' : '' }}"
                        aria-current="true">
                        <a href="{{ route('prodi') }}" class='sidebar-link'>
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Prodi</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::routeIs('pelanggaran') ? 'active' : '' }}"
                        aria-current="true">
                        <a href="{{ route('pelanggaran') }}" class='sidebar-link'>
                            {{-- <i class="bi bi-file-earmark-medical-fill"></i> --}}
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            {{-- <i class="fa-solid fa-chart-pie"></i> --}}
                            <span>Pelanggaran</span>
                        </a>
                    </li>

                    @if (auth()->user()->role === "Dosen")
                    {{-- @can ('manage-mahasiswa') --}}
                    <li class="sidebar-item {{ Request::routeIs('mahasiswa.create') ? 'active' : '' }}"
                        aria-current="true">
                        <a href="{{ route('mahasiswa.create') }}" class='sidebar-link'>
                            <i class="fa-solid fa-user"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                    @endif

                    @if (auth()->user()->role == "SuperAdmin" || auth()->user()->role == "Admin")
                    <li class="sidebar-item {{ Request::routeIs('mahasiswa.data') ? 'active' : '' }}"
                        aria-current="true">
                        <a href="{{ route('mahasiswa.data') }}" class='sidebar-link'>
                            {{-- <i class="bi bi-file-earmark-medical-fill"></i> --}}
                            <i class="fa-solid fa-chart-pie"></i>
                            <span>Pelanggaran Mahasiswa</span>
                        </a>
                    </li>


                    <li class="sidebar-item  has-sub {{ Request::segment(1) === 'laporan' ? 'active' : '' }}"
                        aria-current="true">
                        <a href="#" class='sidebar-link'>
                            {{-- <i class="bi bi-pen-fill"></i> --}}
                            <i class="fa-solid fa-book"></i>
                            <span>Laporan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item {{ Request::routeIs('laporan.mahasiswa') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('laporan.mahasiswa') }}">Mahasiswa</a>
                            </li>
                            <li class="submenu-item {{ Request::routeIs('laporan.prodi') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('laporan.prodi') }}">Prodi</a>
                            </li>
                            <li class="submenu-item {{ Request::routeIs('laporan.detail') ? 'active' : '' }}"
                                aria-current="true">
                                <a href="{{ route('laporan.detail') }}">Detail Prodi</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    {{-- @endif --}}

                    <li class="sidebar-item  ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="d-grid gap-2">
                                {{-- <a href="" class="btn btn-danger">Keluar</a> --}}
                                <button class="btn btn-danger" type="submit">Keluar</button>
                            </div>
                        </form>
                    </li>



                </ul>
            </div>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</nav>