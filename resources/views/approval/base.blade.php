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
                
            </div>
        </nav>
        @yield('navigation')
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