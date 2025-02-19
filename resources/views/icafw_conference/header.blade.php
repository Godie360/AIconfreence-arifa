<div class="gb-menu">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img class="img-responsive"
                        src="{{ asset('assets/images/ICAFW2024_Logo.png') }}" alt="Logo"></a>
            </div>



            <div class="collapse navbar-collapse" id="navbar-collapse" style="margin-left: 40%;">
                <ul class="nav navbar-nav ml-4"> <!-- ml-4 adds margin-left for spacing -->
                    <li class="{{ Request::routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ Request::routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="{{ Request::routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="{{ Request::routeIs('ticket') ? 'active' : '' }}">
                        <a href="{{ route('ticket') }}">Ticket</a>
                    </li>
                    <li class="{{ Request::routeIs('speaker') ? 'active' : '' }}">
                        <a href="{{ route('speaker') }}">Speaker</a>
                    </li>
                    <li class="{{ Request::routeIs('sponsors') ? 'active' : '' }}">
                        <a href="{{ route('sponsors') }}">Sponsors</a>
                    </li>
                    <li class="{{ Request::routeIs('exhibitors') ? 'active' : '' }}">
                        <a href="{{ route('exhibitors') }}">Exhibitors</a>
                    </li>

                    <li class="{{ Request::routeIs('admin/exhibitor-manage/') ? 'active' : '' }}">
                        <a href="{{ route('view_manage_exhibitor') }}">Manage Exhibitors</a>
                    </li>

                </ul>
            </div>




        </div>
    </nav>
</div>
