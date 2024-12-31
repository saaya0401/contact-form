<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-form</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=PT+Serif:ital,wght@0,400;0,700;1,400&family=Sofadi+One&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <div class="header-title">
                <a href="/" class="header-logo">FashionablyLate</a>
            </div>
            <div class="header-button">
                @yield('button')
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>
</html>