@if (Auth::check())
    {{-- マイページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.info',Auth::user()->id) }}">{{Auth::user()->name}}のマイページ</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">アカウント作成</a></li>
@endif