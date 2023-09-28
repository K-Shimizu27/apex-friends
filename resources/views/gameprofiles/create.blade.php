@extends('layouts.app')

@section('content')

    <div class="text-sm breadcrumbs justify-items-start">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li><a href="javascript:history.back()">マイページ</a></li>
            <li>ゲームプロフィール登録</li>
        </ul>
    </div>

    @if (Auth::id() == $user->id)
    
        <div class="prose mx-auto text-center my-4">
            <h1 class="text-white">ゲームプロフィール登録</h1>
        </div>
        <div class="flex justify-center ">
            <form method="POST" action="{{ route('gameprofiles.store') }}" id="body">
                @csrf
                
                <div class="form-control overflow-x-auto h-96">
                    <table class="table table-pin-rows my-4">
                        <tr>
                            <th>
                                <label for="game_id" class="label">ID：</label>
                            </th>
                            <td>
                                <input type="text" name="game_id" class="input input-bordered w-full" >
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="rank" class="label">最高ランク：</label>
                            </th>
                            <td>
                                <input type="text" name="rank" class="input input-bordered w-full" >
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="kd" class="label">K/D：</label>
                            </th>
                            <td>
                                <input type="text" name="kd" class="input input-bordered w-full" >
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="damage" class="label">最高ダメージ：</label>
                            </th>
                            <td>
                                <input type="text" name="damage" class="input input-bordered w-full" >
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="platform" class="label">プラットフォーム：</label>
                            </th>
                            <td>
                                <div>
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="PC" />
                                    <label for="PC">PC</label>
                
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="CS" />
                                    <label for="CS">CS</label>
                                    
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="Switch" />
                                    <label for="Switch">Switch</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="relative ">
                                <label for="character" class="label absolute top-0">主な使用キャラ(複数選択可)：</label>
                            </th>
                            <td class="grid lg:grid-cols-6 md:grid-cols-4 grid-cols-2">
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Wraith" name="character[]" value="レイス" />
                                    <label for="wraith">レイス</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Wattson" name="character[]" value="ワットソン" />
                                    <label for="Wattson">ワットソン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Vantage" name="character[]" value="ヴァンテージ" />
                                    <label for="Vantage">ヴァンテージ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Valkyrie" name="character[]" value="ヴァルキリー" />
                                    <label for="Valkyrie">ヴァルキリー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Seer" name="character[]" value="シア" />
                                    <label for="Seer">シア</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Revenant" name="character[]" value="レヴナント" />
                                    <label for="Revenant">レヴナント</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Rampart" name="character[]" value="ランパート" />
                                    <label for="Rampart">ランパート</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Pathfinder" name="character[]" value="パスファインダー" />
                                    <label for="Pathfinder">パスファインダー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Octane" name="character[]" value="オクタン" />
                                    <label for="Octane">オクタン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Newcastle" name="character[]" value="ニューキャッスル" />
                                    <label for="Newcastle">ニューキャッスル</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Mirage" name="character[]" value="ミラージュ" />
                                    <label for="Mirage">ミラージュ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="MadMaggie" name="character[]" value="マッドマギー" />
                                    <label for="Mad Maggie">マッドマギー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Horizon" name="character[]" value="ホライゾン" />
                                    <label for="Horizon">ホライゾン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Loba" name="character[]" value="ローバ" />
                                    <label for="Loba">ローバ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Lifeline" name="character[]" value="ライフライン" />
                                    <label for="Lifeline">ライフライン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Gibraltar" name="character[]" value="ジブラルタル" />
                                    <label for="Gibraltar">ジブラルタル</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Fuse" name="character[]" value="ヒューズ" />
                                    <label for="Fuse">ヒューズ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Crypto" name="character[]" value="クリプト" />
                                    <label for="Crypto">クリプト</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Caustic" name="character[]" value="コースティック" />
                                    <label for="Caustic">コースティック</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Catalyst" name="character[]" value="カタリスト" />
                                    <label for="Catalyst">カタリスト</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Bloodhound" name="character[]" value="ブラッドハウンド" />
                                    <label for="Bloodhound">ブラッドハウンド</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Bangalore" name="character[]" value="バンガロール" />
                                    <label for="Bangalore">バンガロール</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Ballistic" name="character[]" value="バリスティック"/>
                                    <label for="Ballistic">バリスティック</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Ash" name="character[]" value="アッシュ"/>
                                    <label for="Ash">アッシュ</label>
                                </div>
                            </td>
                            
                        </tr>
                        
                    </table>
                </div>
                <button type="submit" class="btn btn-ghost bg-red-600 btn-block normal-case">登録</button>
            </form>
        </div>
    
    @endif
@endsection