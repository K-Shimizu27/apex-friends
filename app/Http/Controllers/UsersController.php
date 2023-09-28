<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return back();
    }
    
    /**
     * ユーザ詳細ビューを開く
     */
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //ユーザのゲームプロフィールを取得
        $gameprofile = $user->gameprofile()->first();
        
        // ユーザ詳細ビューで表示
        return view('users.show', [
            'user' => $user,
            'gameprofile' => $gameprofile,
        ]); 
    }
    
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $user = Auth::user();

        // メッセージ編集ビューでそれを表示
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'icon' => 'file|mimes:gif,png,jpg,webp|max:3072',
        ]);
        
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        $icon = $request->icon;
        
        //
        if($icon != null){
            \Storage::disk('public')->delete($user->icon);
            $filePath = $icon->store('public');
            $user->icon = str_replace('public/', '', $filePath);
            $user->save();
        }
        
        // データを更新
        $user->name = $request->name;
        $user->email = $request->email;

        //データ保存
        $user->save();

        // 
        return redirect('/users/'.Auth::user()->id.'/info');
    }
    
    public function info($id)
    {
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        return view("users.info",[
            "user" => $user,
        ]);
    }
    
    public function gameprofile($id)
    {
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        // ユーザのゲームプロフィールを取得
        $gameprofile = $user->gameprofile()->first();
        
        return view("users.gameprofile",[
            "user" => $user,
            "gameprofile" => $gameprofile,
        ]);
    }
    
    public function recruit($id)
    {
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        return view("users.recruit",[
            "user" => $user,
        ]);
    }
}
