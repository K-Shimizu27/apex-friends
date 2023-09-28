@extends('layouts.app')

@section('content')
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li>募集作成</li>
        </ul>
    </div>
    <div class="prose mx-auto text-center my-4 ">
        <h1 class="text-white">募集作成</h1>
    </div>
    <div class="flex justify-center " >
        <form method="POST" action="{{ route('recruits.store') }}" class="lg:w-2/3" id="body">
            @csrf
            
            <div class="form-control">
                <label for="title" class="label">
                    <span class="label-text ">募集タイトル：</span>
                </label>
                <input type="text" name="title" class="input input-bordered w-full" placeholder="例)ゴールドランク募集@2">
            </div>
            
            <label for="mode" class="label ">ゲームモード(複数選択可)：</label>
            <div class="form-control ">
                <div class="">
                    <table>
                        <tr>
                            <td>
                                <label for="casual" class="label cursor-pointer w-auto m-0">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="casual" name="mode[]" value="カジュアル" />
                                    <span class="label-text" for="casual">カジュアル</span>
                                </label>
                            </td>
                            <td>
                                <label for="rank" class="label cursor-pointer w-auto m-0">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="rank" name="mode[]" value="ランク" />
                                    <span class="label-text" for="rank">ランク</span>
                                </label>
                            </td>
                            <td>
                                <label for="shooting_range" class="label cursor-pointer w-auto m-0">
                                    <input class="checkbox checkbox-xs"  type="checkbox" id="shooting_range" name="mode[]" value="射撃場" />
                                    <span class="label-text" for="shooting_range">射撃場</span>
                                </label>
                            </td>
                            <td>
                                <label for="other-mode" class="label cursor-pointer w-auto m-0">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="other-mode" name="mode[]" value="その他" />
                                    <span class="label-text" for="other-mode">その他</span>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="form-control ">
                <label for="cross_play" class="label">
                    <span class="label-text">クロスプレイ：</span>
                </label>
                <div>
                    <label for="accept">
                        <input class="radio radio-xs" type="radio" id="accept" name="cross_play" value="0" checked />
                        <span class="label-text" for="accept">可</span>
                    </label>
    
                    <label for="disable">
                        <input class="radio radio-xs" type="radio" id="disable" name="cross_play" value="1" />
                        <span class="label-text" for="disable">不可</span>
                    </label>
                </div>
            </div>
            
            <div class="form-control ">
                <label for="play_style" class="label">
                    <span class="label-text">プレイスタイル：</span>
                </label>
                <div>
                    <label for="enjoy">
                        <input class="radio radio-xs" type="radio" id="enjoy" name="play_style" value="0" checked />
                        <span class="label-text" for="enjoy">エンジョイ</span>
                    </label>
    
                    <label for="serious">
                        <input class="radio radio-xs" type="radio" id="serious" name="play_style" value="1" />
                        <span class="label-text" for="serious">ガチ</span>
                    </label>
                </div>
            </div>
            
            <div class="form-control ">
                <label for="vc" class="label">
                    <span class="label-text">VC(複数選択可)：</span>
                </label>
                <div class="">
                    <table>
                        <tr>
                            <td>
                                <label for="ingame">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="ingame" name="vc[]" value="ゲーム内VC" />
                                    <span class="label-text" for="ingame">ゲーム内VC</span>
                                </label>
                            </td>
                            <td>
                                <label for="ptvc">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="ptvc" name="vc[]" value="PTVC" />
                                    <span class="label-text" for="ptvc">PTVC</span>
                                </label>
                            </td>
                            <td>
                                <label for="discord">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="discord" name="vc[]" value="Discord" />
                                    <span class="label-text" for="discord">Discord</span>
                                </label>
                            </td>
                            <td>
                                <label for="other-vc">
                                    <input class="checkbox checkbox-xs" type="checkbox" id="other-vc" name="vc[]" value="その他" />
                                    <span class="label-text" for="other-vc">その他</span>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        
            <div class="form-control ">
                <label for="" class="label">
                    <span class="label-text">コメント：</span>
                </label>
                <textarea rows="2" name="comment" class="input input-bordered w-full" placeholder="例)誰でも大丈夫です！楽しみましょう！VCはDiscordの予定です！"></textarea>
            </div>
        
            <button type="submit" class="btn btn-error bg-red-600 btn-block normal-case mt-4">募集</button>
        </form>
    </div>

@endsection