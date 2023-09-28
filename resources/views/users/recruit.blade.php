@extends('layouts.app')

@section('content')

<div class="drawer lg:drawer-open overflow-scroll">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle hidden" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label for="my-drawer-2" class="btn btn-ghost bg-red-600 drawer-button lg:hidden">メニュー</label>
        <div class="text-sm breadcrumbs justify-items-start">
            <ul>
                <li><a href="{{route("dashboard")}}">ホーム</a></li> 
                <li>マイページ</li>
            </ul>
        </div>
        <div class="prose mx-auto text-center my-4">
            {{-- 自分の募集 --}}
            <h1 class="text-white">自分の募集</h1>
        </div>
        {{-- 募集があるか判定 --}}
        @if ($user->recruit()->first() == null)
            {{-- 募集がないとき --}}
            <h2 class="text-white">現在募集していません。</h2>
        @else
            {{-- 募集があるとき --}}
            <?php $recruit = $user->recruit()->first(); ?>
            <div class="flex justify-center my-4">
                <table class="table lg:w-2/3 my-4 bg-white">
                    <tr>
                        <th>募集タイトル：</th>
                        <td>{{$recruit->title}}</td>
                    </tr>
                    <tr>
                        <th>ゲームモード：</th>
                        <td>{{$recruit->mode}}</td>
                    </tr>
                    <tr>
                        <th>クロスプレイ：</th>
                        <td>{{$recruit->cross_play == 0 ? "可能":"不可能"}}</td>
                    </tr>
                    <tr>
                        <th>プレイスタイル：</th>
                        <td>{{$recruit->play_style == 0 ? "エンジョイ":"ガチ"}}</td>
                    </tr>
                    <tr>
                        <th>VC：</th>
                        <td>{{$recruit->vc}}</td>
                    </tr>
                    <tr>
                        <th>コメント：</th>
                        <td>{{$recruit->comment}}</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-center my-4">
                <a class="btn btn-ghost bg-red-600" href="{{route("recruits.show",$recruit->id)}}">募集詳細へ</a>
            </div>
        @endif
    </div>
    @include("users.sidebar")
</div>

@endsection