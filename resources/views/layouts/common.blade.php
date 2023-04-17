<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>P! note</title>
        <!-- cssをインポート -->
        <link href="{{ mix('/resources/css/app.scss') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>全体表示</h1>
        @include('parts.header')
        @yield('content')
        <div class="card">
            <div class="card-header">Dashboard</div>
        
            <div class="card-body">
        
                <button>Bootstrap</button>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
        
                You are logged in!
            </div>
        </div>
        


        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>