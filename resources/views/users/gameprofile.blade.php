@extends('layouts.app')

@section('content')

<!-- メッセージ -->
@if (session('gameprofile_flag'))
    <div class="gameprofile_flag alert alert-error mb-4 ">
        {{ session('gameprofile_flag') }}
    </div>
@endif

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
            {{-- ゲームプロフィール --}}
            <h1 class="text-white">ゲームプロフィール</h1>
        </div>
        @if ($user->profile_flag == 0)
            <div class="alert alert-warning">ゲームプロフィール登録は必須です。登録後に各機能が利用可能となります。</div>
            <div class="flex justify-center my-4">
                <table class="table lg:w-2/3 my-4 bg-white">
                    <tr>
                        <th>ID：</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>最高ランク：</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>K/D：</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>最高ダメージ：</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>プラットフォーム：</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>主な使用キャラ：</th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-center my-4">
                <a class="btn btn-ghost bg-red-600" href="{{route('gameprofiles.create')}}"><p>プロフィール情報登録</p></a>
            </div>
        @else
            <div class="flex justify-center my-4">
                <table class="table lg:w-2/3 my-4 bg-white">
                    {{--初回登録以降はこっち--}}
                    <tr>
                        <th>ID：</th>
                        <td>{{$gameprofile->game_id}}</td>
                    </tr>
                    <tr>
                        <th>最高ランク：</th>
                        <td>{{$gameprofile->rank}}</td>
                    </tr>
                    <tr>
                        <th>K/D：</th>
                        <td>{{$gameprofile->kd}}</td>
                    </tr>
                    <tr>
                        <th>最高ダメージ：</th>
                        <td>{{$gameprofile->damage}}</td>
                    </tr>
                    <tr>
                        <th>プラットフォーム：</th>
                        <td>{{$gameprofile->platform}}</td>
                    </tr>
                    <tr>
                        <th>主な使用キャラ：</th>
                        <td>{{$gameprofile->character}}</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-center my-4">
                <a class="btn btn-ghost bg-red-600" href="{{route('gameprofiles.edit',$user->id)}}"><p>プロフィール情報修正</p></a>
            </div>
        @endif
    </div>
    @include("users.sidebar")
</div>
@endsection