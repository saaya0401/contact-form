<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact-form</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">Contact Form</a>
            <nav class="nav">
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <a href="/categories" class="header-nav__link">カテゴリ一覧</a>
                    </li>
                    <li class="header-nav__item">
                        <a href="/users" class="header-nav__link">お問い合わせ一覧</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>