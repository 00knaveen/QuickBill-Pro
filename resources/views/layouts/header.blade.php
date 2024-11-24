<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    @if(Route::current()->getName() == 'index')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @elseif(Route::current()->getName() != 'index')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
     @endif
</head>
<body>
    <div class="container">
        @yield('content')
        @if(session()->has('status-error'))
        <div class="alert alert-success">
                <div class="full">
                    <div class="notifications alert-success cf"><span class="message-icon success"></span>
                        <p>{{ session()->pull('status-error') }}</p><span class="close">X</span>
                    </div>
                </div>
            </div>
            @endif
        @if(session()->has('status-success'))
            <div class="alert alert-success login-success">
            <div class="full" ><div class="notifications alert-success cf"><span class="message-icon success"></span><p>  {{ session()->get('status-success') }}</p><span class="close">X</span></div></div>
            </div>
        @endif
    </div>
  @include('layouts.footer')