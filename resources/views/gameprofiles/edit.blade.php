@extends('layouts.app')

@section('content')

    <div class="text-sm breadcrumbs justify-items-start">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li><a href="javascript:history.back()">マイページ</a></li>
            <li>ゲームプロフィール編集</li>
        </ul>
    </div>
    @if (Auth::id() == $user->id)
    
        <div class="prose mx-auto text-center my-4 ">
            <h1 class="text-white">ゲームプロフィール編集</h1>
        </div>
        <div class="flex justify-center ">
            <form method="POST" action="{{ route('gameprofiles.update',$gameprofile->id) }}" id="body">
                @csrf
                
                <div class="form-control overflow-x-auto h-96 ">
                    <table class="table table-pin-rows my-4">
                        <tr>
                            <th>
                                <label for="game_id" class="label">ID：</label>
                            </th>
                            <td>
                                <input type="text" name="game_id" class="input input-bordered w-full" value="{{$gameprofile->game_id}}">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="rank" class="label">最高ランク：</label>
                            </th>
                            <td>
                                <input type="text" name="rank" class="input input-bordered w-full" value="{{$gameprofile->rank}}">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="kd" class="label">K/D：</label>
                            </th>
                            <td>
                                <input type="text" name="kd" class="input input-bordered w-full" value="{{$gameprofile->kd}}">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="damage" class="label">最高ダメージ：</label>
                            </th>
                            <td>
                                <input type="text" name="damage" class="input input-bordered w-full" value="{{$gameprofile->damage}}">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="platform" class="label">プラットフォーム：</label>
                            </th>
                            <td>
                                <div>
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="PC" {{($gameprofile->platform == "PC") ? "checked" :""}}/>
                                    <label for="PC">PC</label>
                
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="CS" {{($gameprofile->platform == "CS") ? "checked" :""}}/>
                                    <label for="CS">CS</label>
                                    
                                    <input class="radio radio-xs" type="radio" id="platform" name="platform" value="Switch" {{($gameprofile->platform == "Switch") ? "checked" :""}}/>
                                    <label for="Switch">Switch</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="relative ">
                                <label for="character" class="label absolute top-0">主な使用キャラ(複数選択可)：</label>
                            </th>
                            <td class="grid lg:grid-cols-6 md:grid-cols-4 grid-cols-2">
                                <?php 
                                    //文字列を配列に変換
                                    $chara_array = explode("," , $gameprofile->character);
                                ?>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Wraith" name="character[]" value="レイス" {{ (in_array('レイス', $chara_array)) ? "checked" :"" }}/>
                                    <label for="wraith">レイス</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Wattson" name="character[]" value="ワットソン" {{ (in_array('ワットソン', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Wattson">ワットソン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Vantage" name="character[]" value="ヴァンテージ" {{ (in_array('ヴァンテージ', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Vantage">ヴァンテージ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Valkyrie" name="character[]" value="ヴァルキリー" {{ (in_array('ヴァルキリー', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Valkyrie">ヴァルキリー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Seer" name="character[]" value="シア" {{ (in_array('シア', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Seer">シア</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Revenant" name="character[]" value="レヴナント" {{ (in_array('レヴナント', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Revenant">レヴナント</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Rampart" name="character[]" value="ランパート" {{ (in_array('ランパート', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Rampart">ランパート</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Pathfinder" name="character[]" value="パスファインダー" {{ (in_array('パスファインダー', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Pathfinder">パスファインダー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Octane" name="character[]" value="オクタン" {{ (in_array('オクタン', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Octane">オクタン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Newcastle" name="character[]" value="ニューキャッスル" {{ (in_array('ニューキャッスル', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Newcastle">ニューキャッスル</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Mirage" name="character[]" value="ミラージュ" {{ (in_array('ミラージュ', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Mirage">ミラージュ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="MadMaggie" name="character[]" value="マッドマギー" {{ (in_array('マッドマギー', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Mad Maggie">マッドマギー</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Horizon" name="character[]" value="ホライゾン" {{ (in_array('ホライゾン', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Horizon">ホライゾン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Loba" name="character[]" value="ローバ" {{ (in_array('ローバ', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Loba">ローバ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Lifeline" name="character[]" value="ライフライン" {{ (in_array('ライフライン', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Lifeline">ライフライン</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Gibraltar" name="character[]" value="ジブラルタル" {{ (in_array('ジブラルタル', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Gibraltar">ジブラルタル</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Fuse" name="character[]" value="ヒューズ" {{ (in_array('ヒューズ', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Fuse">ヒューズ</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Crypto" name="character[]" value="クリプト" {{ (in_array('クリプト', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Crypto">クリプト</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Caustic" name="character[]" value="コースティック" {{ (in_array('コースティック', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Caustic">コースティック</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Catalyst" name="character[]" value="カタリスト" {{ (in_array('カタリスト', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Catalyst">カタリスト</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Bloodhound" name="character[]" value="ブラッドハウンド" {{ (in_array('ブラッドハウンド', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Bloodhound">ブラッドハウンド</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Bangalore" name="character[]" value="バンガロール" {{ (in_array('バンガロール', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Bangalore">バンガロール</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Ballistic" name="character[]" value="バリスティック" {{ (in_array('バリスティック', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Ballistic">バリスティック</label>
                                </div>
                                <div>
                                    <input class="checkbox checkbox-xs" type="checkbox" id="Ash" name="character[]" value="アッシュ" {{ (in_array('アッシュ', $chara_array)) ? "checked" :"" }}/>
                                    <label for="Ash">アッシュ</label>
                                </div>
                            </td>
                            
                        </tr>
                        
                    </table>
                </div>
                

                <button type="submit" class="btn btn-ghost bg-red-600 btn-block normal-case">更新</button>
            </form>
        </div>
    
    @endif
@endsection