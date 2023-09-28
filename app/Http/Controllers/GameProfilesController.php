<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\GameProfile;

class GameProfilesController extends Controller
{
    
    public function index()
    {
        return back();
    }
    
    public function create()
    {
        return view('gameprofiles.create',[
            'user' => Auth::user(),
        ]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'game_id' => 'required',
            'rank' => 'required',
            'kd' => 'required|numeric',
            'damage' => 'required|numeric',
            'platform' => 'required',
            'character' => 'required|max:255',
        ]);
        
        //キャラのデータをまとめる
        $character = "";
        for($i = 0; $i < count($request->character);$i++){
            $character .= $request->character[$i].",";
        }
        
        //文字列の最後に","が入ってしまうため末尾を削除
        $character = substr($character, 0, -1);
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->gameprofile()->create([
            'game_id' => $request->game_id,
            'rank' => $request->rank,
            'kd' => $request->kd,
            'damage' => $request->damage,
            'platform' => $request->platform,
            'character' => $character,
        ]);
        
        $request->user()->update_flag();
        
        return redirect('/users/'.Auth::user()->id.'/gameprofile');
    }
    
    public function show($id)
    {
        return back();
    }
    
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $user = Auth::user();
        
        $gameprofile = $user->gameprofile()->first();

        // メッセージ編集ビューで表示
        return view('gameprofiles.edit', [
            'user' => $user,
            'gameprofile' => $gameprofile,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'game_id' => 'required',
            'rank' => 'required',
            'kd' => 'required|numeric',
            'damage' => 'required|numeric',
            'platform' => 'required',
            'character' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $gameprofile = GameProfile::findOrFail($id);
        
        //キャラのデータをまとめる
        $character = "";
        for($i = 0; $i < count($request->character);$i++){
            $character .= $request->character[$i].",";
        }
        
        //文字列の最後に","が入ってしまうため末尾を削除
        $character = substr($character, 0, -1);
        
        // データを更新
        $gameprofile->game_id = $request->game_id;
        $gameprofile->rank = $request->rank;
        $gameprofile->kd = $request->kd;
        $gameprofile->damage = $request->damage;
        $gameprofile->platform = $request->platform;
        $gameprofile->character = $character;
        
        //データ保存
        $gameprofile->save();

        // 
        return redirect('/users/'.Auth::user()->id.'/gameprofile');
    }
}
