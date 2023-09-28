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
            <!--<ul class="list-none mt-4 p-0">-->
            <!--    <details class="collapse bg-base-200">-->
            <!--        <summary class="collapse-title text-xs font-medium m-0 p-0">　▼検索条件を追加する</summary>-->
            <!--        <div class="collapse-content"> -->
            <!--            <li>-->
            <!--                <label for="mode" class="label">ゲームモード：</label>-->
            <!--                <div>-->
            <!--                    <input type="checkbox" id="casual" name="mode[]" value="カジュアル" />-->
            <!--                    <label for="casual">カジュアル</label>-->
            
            <!--                    <input type="checkbox" id="rank" name="mode[]" value="ランク" />-->
            <!--                    <label for="rank">ランク</label>-->
            
            <!--                    <input type="checkbox" id="shooting_range" name="mode[]" value="射撃場" />-->
            <!--                    <label for="shooting_range">射撃場</label>-->
            
            <!--                    <input type="checkbox" id="other-mode" name="mode[]" value="その他" />-->
            <!--                    <label for="other-mode">その他</label>-->
            <!--                </div>-->
            <!--            </li>-->

        
            <!--            <li>-->
            <!--                <label for="cross_play" class="label">-->
            <!--                    <span class="label-text">クロスプレイ：</span>-->
            <!--                </label>-->
            <!--                <div>-->
            <!--                    <input type="radio" id="accept" name="cross_play" value="0" checked />-->
            <!--                    <label for="accept">可</label>-->
            
            <!--                    <input type="radio" id="disable" name="cross_play" value="1" />-->
            <!--                    <label for="disable">不可</label>-->
            <!--                </div>-->
            <!--            </li>-->
        
            <!--            <li>-->
            <!--                <label for="play_style" class="label">-->
            <!--                    <span class="label-text">プレイスタイル：</span>-->
            <!--                </label>-->
            <!--                <div>-->
            <!--                    <input type="radio" id="enjoy" name="play_style" value="0" checked />-->
            <!--                    <label for="enjoy">エンジョイ</label>-->
            
            <!--                    <input type="radio" id="serious" name="play_style" value="1" />-->
            <!--                    <label for="serious">ガチ</label>-->
            <!--                </div>-->
            <!--            </li>-->
        
            <!--            <li>-->
            <!--                <label for="vc" class="label">-->
            <!--                    <span class="label-text">VC：</span>-->
            <!--                </label>-->
            <!--                <div>-->
            <!--                    <input type="checkbox" id="ingame" name="vc[]" value="ゲーム内VC" />-->
            <!--                    <label for="ingame">ゲーム内VC</label>-->
            
            <!--                    <input type="checkbox" id="ptvc" name="vc[]" value="PTVC" />-->
            <!--                    <label for="ptvc">PTVC</label>-->
            
            <!--                    <input type="checkbox" id="discord" name="vc[]" value="Discord" />-->
            <!--                    <label for="discord">Discord</label>-->
            
            <!--                    <input type="checkbox" id="other-vc" name="vc[]" value="その他" />-->
            <!--                    <label for="other-vc">その他</label>-->
            <!--                </div>-->
            <!--            </li>-->
            <!--        </div>-->
            <!--    </details>-->
            <!--</ul>-->
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
        @else
            <p class="text-white">条件に合う募集がありません。</p>
            <a class="link link-primary" href="{{route("recruits.search")}}">＜ 募集一覧に戻る</a>
        @endif 
    </div>
@endsection