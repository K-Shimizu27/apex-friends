@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="text-sm breadcrumbs text-white">
            <ul>
                <li>ホーム</li> 
            </ul>
        </div>
        <div class="prose mx-auto text-center my-4">
                <h1 class="text-white">ようこそ{{Auth::user()->name}}さん</h1>
                <h2 class="text-white">直近で以下の募集がありました</h2>
        </div>
        {{-- 投稿一覧 --}}
        <div class="flex justify-center my-4 overflow-x-auto h-72">
                <?php $recruits = DB::table('recruits')->orderBy('created_at', 'desc')->limit(5)->get(); ?>
                 @if (isset($recruits))
                    <table class="table table-pin-rows table-pin-col lg:w-2/3 my-4 ">
                        <thead>
                            <tr class="bg-gray-400 text-white">
                                <th>タイトル</th>
                                <th>ゲームモード</th>
                                <th>募集日時</th>
                                <th>コメント</th>
                            </tr>
                        </thead>
                        @foreach ($recruits as $recruit)
                            <tbody>
                                <tr class="bg-white">
                                    <td><a class="link link-hover link-primary" href="{{route('recruits.show',$recruit->id)}}">{{ $recruit->title }}</a></td>
                                    <td class="text-black">{{ $recruit->mode }}</td>
                                    <td class="text-black">{{ $recruit->created_at }}</td>
                                    <td class="text-black">{{ $recruit->comment }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @endif
        </div>
        <div class="text-center my-4">
            {{-- 募集作成ページへのリンク --}}
            <a class="btn btn-error bg-red-600 btn-lg normal-case mx-auto min-w-max w-1/3 p-0" href="{{route('recruits.create')}}">募集する</a>
            {{-- 募集検索ページへのリンク --}}
            <a class="btn btn-error bg-red-600 btn-lg normal-case mx-auto min-w-max w-1/3 p-0" href="{{route('recruits.search')}}">募集を探す</a>
        </div>
    @else
        <div class="prose mx-auto text-center my-4 ">
            <h1 id="title">ApexFriends</h1>
            <p class="mx-auto text-center text-base text-white underline underline-offset-8">ApexFriendsは"ApexLegends"を一緒に遊ぶ"Friends"を見つけるためのサービスです。</p>
        </div>

        <div class="text-center my-8 ">
            {{-- ログインページへのリンク --}}
            <a class="btn btn-error bg-red-600 btn-lg normal-case mx-auto min-w-max w-1/4 p-0" href="{{ route('login') }}">ログイン</a>
            {{-- アカウント作成ページへのリンク --}}
            <a class="btn btn-error bg-red-600 btn-lg normal-case mx-auto min-w-max w-1/4 p-0" href="{{ route('register') }}">アカウント作成</a>
        </div>
        
    @endif
@endsection