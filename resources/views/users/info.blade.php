@extends('layouts.app')

@section('content')

<div class="drawer lg:drawer-open overflow-scroll">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle hidden" />
    <div class="drawer-content ">
        <!-- Page content here -->
        <label for="my-drawer-2" class="btn btn-ghost bg-red-600 drawer-button lg:hidden">メニュー</label>
        <div class="text-sm breadcrumbs justify-items-start">
            <ul>
                <li><a href="{{route("dashboard")}}">ホーム</a></li> 
                <li>マイページ</li>
            </ul>
        </div>
        <div class="prose mx-auto text-center my-4">
            <h1 class="text-white">ユーザ情報</h1>
        </div>
        <div class="flex justify-center my-4">
            {{-- ユーザ情報 --}}
            <table class="table lg:w-2/3 my-4 bg-white">
                <tr>
                    <th>アイコン：</th>
                    <td>
                        <div class="avatar w-28">
                            <img src="{{\Storage::url($user->icon)}}" alt="icon"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>ユーザ名：</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>メールアドレス：</th>
                    <td>{{$user->email}}</td>
                </tr>
            </table>
        </div>
        <div class="flex justify-center my-4">
            <a class="btn btn-ghost bg-red-600" href="{{route('users.edit',$user->id)}}">ユーザ情報修正</a>
        </div>
    </div>
    @include("users.sidebar")
</div>

@endsection