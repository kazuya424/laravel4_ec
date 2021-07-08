@auth
    <nav class="navbar navbar-dark bg-warning">
        <a class="navbar-brand text-dark" href="/" style="font-size:x-large;">全国特産品ECサイト</a>
        <ul class="list-inline navbar-brand-01 text-dark">
            <ul class="list-inline navbar-brand text-dark">
                <li class="navbar bg-faded text-right" style="flex-direction: row-reverse;">{{ Auth::user()->fullName }}さん</li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('product.index') }}">商品検索</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('cart.index') }}">カート</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('order.all',['all' => 'all']) }}">注文履歴</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('user.show', ['id' => Auth::id()])}}">ユーザー情報</a></li>
                <li class="list-inline-item"><a class="nav-link" href="{{ route('logout') }}">ログアウト</a></li>
            </ul>
        </ul>
    </nav>
@endauth

@guest
    <div class="navbar navbar-dark bg-warning">
        <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        全国特産品ECサイト
        </a>
        <ul class="list-inline navbar-brand text-dark">
            <li class="list-inline-item">
                <a class="nav-link" href="{{ route('auth.login') }}">ログイン</a>
            </li>
            <li class="list-inline-item">
                <a class="nav-link" href="{{ route('auth.register') }}">新規登録</a>
            </li>
        </ul>
    </div>
@endguest
