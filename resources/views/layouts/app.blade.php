@sintexlayouttop


    @slot('page_title')
        MSRS - @yield('title','Maintenance Service Request System')
    @endslot


    @slot('nav_brand')
        <div>
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/1458528.png') }}" class="brand-logo">
                <span>Maintenance Service Request</span>
            </a>
        </div>
        
    @endslot


    @slot('navigation')
        <nav class="navbar-custom-menu">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a style="color:white" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a style="color:white" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    
                    @else
                        <li>
                            <a href=" {{ route ('home') }} "> Home </a>
                        </li>
                        <li class="{{ auth()->user()->isAdmin == 0 ? 'hidden' : '' }}">
                            <a href=" {{ route ('users') }} "> Users </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="color:white"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                       
                    @endguest
                </ul>
            </div>
        </nav>
        @yield('navigation')
    @endslot



    @slot('breadcrumbs')
        @yield('breadcrumbs')
    @endslot

    @slot('skin', 'skin-blue-light')



    @slot('start_script')
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">     
        @yield('start_script')
    @endslot



    @slot('content')
        @yield('content')
    @endslot

    @slot('end_script')
        @yield('end_script')
    @endslot


    @slot('footer')
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 2018
            <a href="/"><img class="sci" src="http://cdn.sportscity.com.ph/images/sci_logo.png"> Sportscity
                International</a>.</strong> All rights reserved.
    @endslot

@endsintexlayouttop