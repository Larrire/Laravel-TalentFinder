<html>
    <head>
        <title>Talent Finder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/template_logged.css') }}" rel="stylesheet" type="text/css" >
        @yield('head')
    </head>
    <body>
        <div id="div-dashboard">
            <aside id="aside-menu">
                <div id="div-avatar">
                    <div id="div-btn-toggle-menu">
                        <button class="toggle-mobile-menu" onclick="toggleMenu()"><i class="fa fa-bars"></i></button>
                    </div>
                    <img id="avatar-img" src="https://www.w3schools.com/w3images/avatar6.png" alt="user image">
                </div>
                <div id="div-username">
                    {{$user_name}}
                </div>
                <nav id="nav-links">
                    <a href="{{url('home')}}">
                        <div class="link @if($active_link==='home') active @endif">Home</div>
                    </a>
                    <a href="{{url('profile')}}">
                        <div class="link @if($active_link==='profile') active @endif">Profile</div>
                    </a>
                    <a href="{{url('search')}}">
                        <div class="link @if($active_link==='search') active @endif">Search</div>
                    </a>
                    <a href="#">
                        <div class="link">Home</div>
                    </a>
                    <a href="{{route('logout')}}">
                        <div class="link">Logout</div>
                    </a>
                </nav>
            </aside>
            <main id="page-content">
                <header id="mobile-header">
                    <button class="toggle-mobile-menu" onclick="toggleMenu()"><i class="fa fa-bars"></i></button>
                </header>
                <div class="card section">
                    <header id="content-page-header" class="card-body">
                        <h2 id="page-title">
                            {{-- Page Name --}}
                            @yield('title')
                        </h2>
                        <div class="breadcrumb">
                            <span>Talent Finder</span>
                            {{-- Breadcrumb --}}
                            @yield('breadcrumb')
                        </div>
                    </header>
                </div>
                {{-- Page content --}}
                @yield('page-content')
            </main>
        </div>

        {{-- Modal loading --}}
        <div id="modal-loading" class="modal modal-center modal-blur display-none">
            <div class="modal-content large-modal-content">
                <img style="height:75px;" src="{{asset('gif/loading.gif')}}" alt="">
            </div>
        </div>

        <script src="https://kit.fontawesome.com/0f08d52c86.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/global.js')}}"></script>
    </body>
</html>