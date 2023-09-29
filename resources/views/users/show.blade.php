@extends('layouts.app')

@section('content')
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li><a href="{{route("recruits.search")}}">募集検索</a></li>
            <li><a href="javascript:history.back()">募集詳細</a></li>
            <li>ユーザー詳細</li>
        </ul>
    </div>
    <div class="prose mx-auto text-center my-4">
        <h1 class="text-white">ユーザー詳細</h1>
    </div>

    <div class="flex justify-center my-4">
        {{-- ゲームプロフィール --}}
        <table class="table lg:w-2/3 my-4 bg-white">
            <tr>
                <th>
                    <div class="avatar w-14">
                        <img src="{{ \Storage::url($user->icon) }}" alt="icon"/>
                    </div>
                </th>
                <td>ユーザ名：{{$user->name}}</td>
            </tr>
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
@endsection