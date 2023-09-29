<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        
        $filepath = Storage::url($user->icon);
        
        // ユーザ詳細ビューで表示
        return view('users.show', [
            'user' => $user,
            'gameprofile' => $gameprofile,
            'filepath' => $filepath,
        ]); 
    }
    
    public function edit($id)
    {
        if(Auth::user()->id != $id)
        {
            return redirect("/");
        }
        
        // idの値でメッセージを検索して取得
        $user = User::findOrFail($id);

        // 編集ビューでそれを表示
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::user()->id != $id)
        {
            return redirect("/");
        }
        
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'icon' => 'file|mimes:gif,png,jpg,webp|max:3072',
        ]);
        
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        $icon = $request->file('icon');
        
        //
        if($icon != null){
            if($user->icon != null){
                \Storage::disk('public')->delete($user->icon);
            }
            
            $filePath = \Storage::putFile('public', $icon);
            $user->icon = $filePath;
            // $user->save();
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
        if(Auth::user()->id != $id)
        {
            return redirect("/");
        }
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        return view("users.info",[
            "user" => $user,
        ]);
    }
    
    public function gameprofile($id)
    {
        if(Auth::user()->id != $id)
        {
            return redirect("/");
        }
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
        if(Auth::user()->id != $id)
        {
            return redirect("/");
        }
        //idでユーザを検索して取得
        $user = User::findOrFail($id);
        
        return view("users.recruit",[
            "user" => $user,
        ]);
    }
}
