<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Bloggerlist</title>

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
<body class="gray-bg" v-cloak>
    <div id="spark-app">
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

    </div>

    <!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <script src="{{ elixir('js/main.js') }}"></script>
</body>
</html>