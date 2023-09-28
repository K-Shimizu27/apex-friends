<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Recruit;
use App\Models\User;

use DB;
class RecruitsController extends Controller
{
    public function index()
    {
        return back();
    }
    
    public function store(Request $request)
    {
        //ユーザの募集の数を確認
        $request->user()->loadRelationshipCounts();
        
        if($request->user()->recruit_count != 0)
        {
            //すでに募集している場合の処理
            return redirect("/recruits/search")
            ->with('flash_message','複数同時に募集できません。');
        }
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'mode' => 'required',
            'cross_play' => 'required',
            'play_style' => 'required',
            'vc' => 'required',
            'comment' => 'required|max:255',
        ]);
        
        //モードのデータをまとめる
        $mode="";
        for($i = 0; $i < count($request->mode);$i++){
            $mode .= $request->mode[$i].",";
        }
        //VCのデータをまとめる
        $vc = "";
        for($i = 0; $i < count($request->vc);$i++){
            $vc .= $request->vc[$i].",";
        }
        
        //文字列の最後に","が入ってしまうため末尾を削除
        $mode = substr($mode, 0, -1);
        $vc = substr($vc, 0, -1);
        
        // ユーザの募集として作成
        $request->user()->recruit()->create([
            'title' => $request->title,
            'mode'=>$mode,
            'cross_play'=>$request->cross_play,
            'play_style'=>$request->play_style,
            'vc'=>$vc,
            'comment' => $request->comment,
        ]);
        
        // 
        return redirect("/recruits/search");
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $recruit = Recruit::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその募集の所有者である場合は投稿を削除
        if (\Auth::id() === $recruit->user_id) {
            $recruit->delete();
            return redirect("/recruits/search")
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return redirect("/recruits/search")
            ->with('Delete Failed');
    }
    
    public function show($id)
    {
        $recruit = Recruit::findOrFail($id);
        
        $messages = $recruit->messages()->orderBy('created_at', 'asc')->get();
        
        return view("recruits.show",[
            "recruit" => $recruit, 
            'messages' => $messages,
        ]);
    }
    
    public function create()
    {
        $user = Auth::user();
         
        return view("recruits.create",[
            "user" => $user, 
        ]);
    }
    
    public function search(Request $request)
    {
        if($request->keyword != null)
        {
            $recruits = Recruit::where("title", "LIKE", "%".$request->keyword."%")->orderBy('created_at', 'desc')->paginate(10); 
            
            return view("recruits.search",[
                "recruits" => $recruits,
            ]);
        }
        else
        {
            $recruits = DB::table('recruits')->orderBy('created_at', 'desc')->paginate(10);
            
            return view("recruits.search",[
                "recruits" => $recruits,
            ]);
        }
    }
}
