<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Bloggerlist - The Social Media platform for bloggers">
    <meta name="author" content="RobGloudemans Webdevelopment">
    <title>The Bloggerlist &raquo; Welcome</title>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{ elixir('css/landing.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    @include('landing.navigation')
    @include('landing.slideshow')
    @include('landing.features-1')
    @include('landing.features-2')
    @include('landing.team')
    @include('landing.features-3')
    @include('landing.timeline')
    @include('landing.testimonials')
    @include('landing.comments')
    @include('landing.features-4')
    @include('landing.pricing')
    @include('landing.contact')

    <script src="{{ elixir('js/landing.js') }}"></script>
</body>
</html>