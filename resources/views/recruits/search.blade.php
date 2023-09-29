@extends('layouts.app')

@section('content')
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message alert alert-error mb-4">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li>募集検索</li>
        </ul>
    </div>
    <div class="prose mx-auto text-center my-4">
        <h1 class="text-white">募集検索</h1>
    </div>
    <div class="flex justify-center my-4">
        <form action="{{route("recruits.search")}}" method="GET">
            <input class="input input-bordered" type="text" name="keyword" placeholder="タイトルから検索できます">
            <input class="btn btn-error bg-red-600 normal-case" type="submit" value="検索">
        </form>
    </div>
    <div class="flex justify-center my-4 overflow-x-auto h-72">
        <table class="table table-pin-rows table-pin-col w-2/3 my-4">
            <thead>
                <tr class="bg-gray-400 text-white">
                    <th>タイトル</th>
                    <th>ゲームモード</th>
                    <th>募集日時</th>
                    <th>コメント</th>
                </tr>
            </thead>
            @if (count($recruits) >0)
                @foreach ($recruits as $recruit)
                    <tbody>
                        <tr class="bg-white">
                            <td><a class="link link-hover link-primary" href="{{route('recruits.show',$recruit->id) }}">{{ $recruit->title }}</a></td>
                            <td>{{ $recruit->mode }}</td>
                            <td>{{ $recruit->created_at }}</td>
                            <td>{{ $recruit->comment }}</td>
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody>
                    <tr class="bg-white">
                        <td colspan="4" class="text-center">
                            <p>条件に合う募集がありません。</p><br>
                            <a class="link link-primary" href="{{route("recruits.search")}}">募集一覧に戻る</a>
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </div>
    <div class="text-center my-4">
        {{-- ページネーションのリンク --}}
        @if (count($recruits) >0)
            <div class="join">
                {{ $recruits->links() }}
            </div>
            <p class="text-white">全{{ $recruits->total() }}件中 
            {{  ($recruits->currentPage() -1) * $recruits->perPage() + 1}} - 
            {{ (($recruits->currentPage() -1) * $recruits->perPage() + 1) + (count($recruits) -1)  }}件の募集が表示されています。</p>
        @endif 
    </div>
@endsection