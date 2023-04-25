<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Styles -->


    </head>
    <body class="antialiased">

        
        <div class="m-3">
            @if (Route::has('login'))
                <div class="sm:fixed sm:right-4 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">


                <div class="mt-16">
                    <div class="mt-5 text-center">
                    <p class="pt-5">プログラミング言語のメソッドやオブジェクトなどを<br>メモしておけるアプリケーションです！</p>
                    
                    <div class="d-flex justify-content-center pt-5">
                        
                        <a href="{{ route('login') }}">
                            <div class="mr-5">
                                <h2 class="text-white btn btn-info px-5">LOGIN</h2>
                            </div>
                        </a>
                        
                        <a href="{{ route('register') }}">
                            <a href="{{ route('login') }}">
                            <div>
                                <h2 class="text-white btn btn-success px-5">SIGN UP</h2>
                            </div>
                        </a>
                    </div>
  
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>

<style>
    body{
        background-image: url('storage/images/kirin.jpg');
        background-repeat: no-repeat;
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
    p{
        font-family: YuGothic,'Yu Gothic',YuGothic,'Yu Gothic',sans-serif;
    }
</style>