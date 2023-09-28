<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

use Illuminate\Support\Facades\Auth;
use DB;

class MessagesController extends Controller
{
    public function index()
    {
        return back();
    }
    
    public function store(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            "message" => "required|max:255",
        ]);
        
        //ユーザのメッセージとして作成
        $request->user()->messages()->create([
            "recruit_id" => $id,
            "user_id" => $request->user()->id,
            "message" => $request->message,
        ]);
        
        //
        // 募集詳細ビューでそれを表示
        return back();
    }
    
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $message = \App\Models\Message::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $message->user_id) {
            $message->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
    
    public function show($id)
    {
        // idの値で募集を検索して取得
        $recruit = Recruit::findOrFail($id);
        
        // 募集のメッセージ一覧を作成日時の昇順で取得
        $messages = $recruit->messages()->orderBy('created_at', 'asc');

        // 募集詳細ビューでそれを表示
        return view('recruits.show', [
            'recruit' => $recruit,
            'messages' => $messages,
        ]);
    }
}
