<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Pemantauan') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('assets/vendors/apexcharts/apexcharts.css') }}">

    <script src="{{ url('https://kit.fontawesome.com/ed1a4885d0.js') }}" crossorigin="anonymous"></script>

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    {{-- <x-jet-banner />
        <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    
                        {{ $header }}
    </div>
    </header>
    @endif --}}
    {{-- <header class="navbar navbar-light bs-white" >
                <div class="container">
                        
                </div>
            </header> --}}

    <!-- Page Content -->
    {{-- <main>
                {{ $slot }}
    </main> --}}
    {{-- @livewire('header') --}}

    <header class="p-3 border-bottom sticky-top bg-white fixed-top">
        {{-- <div class="container"> --}}
            <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
                {{-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" /></svg>
                </a> --}}
                
                        <div class="d-flex align-items-center mb-lg-0 me-lg-3">{{ Auth::user()->name }}</div>
                    
                        <div class="dropdown text-end ">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                {{-- <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}">Pengaturan</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        {{-- <div class="d-grid gap-2"> --}}
                                            {{-- <a href="" class="btn btn-danger">Keluar</a> --}}
                                            {{-- <button class="btn btn-danger" type="submit">Keluar</button>
                                        </div> --}}
                                        <button class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                   
              
            </div>
        {{-- </div> --}}
        
        {{-- <div class="">{{ Auth::user()->name }}</div> --}}
        {{-- <div class="dropdown text-end ">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </header>

    @livewire('navigation-menu')

    {{ $slot }}
    @stack('modals')

    @livewireScripts

    <script src="{{ url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('assets/js/mazer.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}

    <script src="{{ url('assets/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ url('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ url('assets/js/pages/ui-apexchart.js') }}"></script>



    @include('sweetalert::alert')
</body>

</html>