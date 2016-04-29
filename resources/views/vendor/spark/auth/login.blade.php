@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.</p>
            <p>Login in. To see it in action.</p>

            @include('spark::shared.errors')

            <form class="m-t" role="form" action="/login" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="{{ url('/password/reset') }}"><small>Forgot password?</small></a>
                {{--<p class="text-muted text-center"><small>Do not have an account?</small></p>--}}
                {{--<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>--}}
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

@endsection