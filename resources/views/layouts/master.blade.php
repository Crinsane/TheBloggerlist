<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Bloggerlist</title>

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <link href="{{ elixir('css/main.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>
    </script>
</head>
<body v-cloak>
    <div id="spark-app">
        <div id="wrapper">
            @include('partials.navigation')

            <div id="page-wrapper" class="gray-bg">
                @include('partials.header')

                @if(Route::currentRouteNamed('home'))
                    {{--@include('dashboard.header')--}}
                @else
                    @include('partials.breadcrumbs')
                @endif

                <div class="wrapper wrapper-content animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>

                @include('partials.footer')
            </div>
        </div>

        @if (Auth::check())
            @include('partials.sidebar-right')
        @endif

        <!-- Application Level Modals -->
        @if (Auth::check())
            {{--@include('spark::modals.notifications-original')--}}
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

    </div>

    <script src="{{ elixir('js/main.js') }}"></script>

    <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>

</body>
</html>
