<spark-navbar
        :user="user"
        :teams="teams"
        :current-team="currentTeam"
        :has-unread-notifications="hasUnreadNotifications"
        :has-unread-announcements="hasUnreadAnnouncements"
        inline-template>

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle" src="{{ auth()->user()->photo_url }}" style="max-width: 48px;"></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs"><strong class="font-bold">{{ auth()->user()->name }}</strong></span>
                                <span class="text-muted text-xs block">{{ auth()->user()->description }} <b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs" style="-moz-animation-duration: .5s;">
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            <!-- Impersonation -->
                            @if (session('spark:impersonator'))
                                <li class="dropdown-header">Impersonation</li>
                                <!-- Stop Impersonating -->
                                <li><a href="/spark/kiosk/users/stop-impersonating"><i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account</a></li>
                                <li class="divider"></li>
                            @endif
                            <!-- Developer -->
                            @if (Spark::developer(Auth::user()->email))
                                @include('spark::nav.developer')
                            @endif
                            <!-- Subscription Reminders -->
                            @include('spark::nav.subscriptions')
                            <!-- Settings -->
                            <li class="dropdown-header">Settings</li>
                            <!-- Your Settings -->
                            <li><a href="/settings"><i class="fa fa-fw fa-btn fa-cog"></i>Your Settings</a></li>

                            @if (Spark::usesTeams())
                                <!-- Team Settings -->
                                @include('spark::nav.teams')
                            @endif
                            <li class="divider"></li>
                            <!-- Support -->
                            <li class="dropdown-header">Support</li>
                            <li><a @click.prevent="showSupportForm" style="cursor: pointer;"><i class="fa fa-fw fa-btn fa-paper-plane"></i>Email Us</a></li>
                            <li class="divider"></li>
                            <!-- Logout -->
                            <li><a href="/logout"><i class="fa fa-fw fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">BL</div>
                </li>
                <li {!! Request::is('dashboard') ? 'class="active"' : '' !!}>
                    <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Bloggers</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-building"></i> <span class="nav-label">Companies</span></span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bars"></i> <span class="nav-label">Projects</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-question-circle"></i> <span class="nav-label">FAQ</span></a>
                </li>
            </ul>

        </div>
    </nav>

</spark-navbar>