@extends('layouts.app')

@section('content')
    <div class="text-sm breadcrumbs">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li><a href="{{route("recruits.search")}}">募集検索</a></li>
            <li>募集詳細</li>
        </ul>
    </div>
    <div class="prose mx-auto text-center my-4">
        <h1 class="text-white">募集詳細</h1>
    </div>
    <div class="flex justify-center bg-white lg:w-2/3 mx-auto">
        <?php $user = $recruit->user(); ?>
        <div class=" justify-items-start">
            <div class="avatar w-14">
                <img src="{{ \Storage::url($user->icon) }}" alt="icon" />
            </div>
            <a class="link link-hover link-primary" href="{{route('users.show',$recruit->user_id);}}">{{$user->name}}さん</a>
        </div>

        @if (Auth::id() == $recruit->user_id)
            {{-- 投稿削除ボタンのフォーム --}}
            <form method="POST" action="{{ route('recruits.destroy', $recruit->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error bg-red-600 btn-sm normal-case" 
                    onclick="return confirm('募集を締め切りますか?(この募集は削除されます)')">募集締め切り</button>
            </form>
        @endif
    </div>

    <div class="flex justify-center overflow-x-auto h-min">
        <table class="table table-pin-col lg:w-2/3 ">
            <tbody  class="bg-white">
                <tr>
                    <th >募集タイトル：</th>
                    <td>{{$recruit->title}}</td>
                </tr>
                <tr>
                    <th>ゲームモード：</th>
                    <td>{{$recruit->mode}}</td>
                </tr>
                <tr>
                    <th>クロスプレイ：</th>
                    <td>{{$recruit->cross_play == 0 ? "可能":"不可能"}}</td>
                </tr>
                <tr>
                    <th>プレイスタイル：</th>
                    <td>{{$recruit->play_style == 0 ? "エンジョイ":"ガチ"}}</td>
                </tr>
                <tr>
                    <th>VC：</th>
                    <td>{{$recruit->vc}}</td>
                </tr>
                <tr>
                    <th>コメント：</th>
                    <td>{{$recruit->comment}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="bg-gray-100 my-4">
        <div class="prose mx-auto text-center">
            <h3>メッセージ</h3>
        </div>
        <div class="flex justify-center overflow-x-auto h-80 ">
            <table class="table table-pin-rows lg:w-2/3 bg-gray-100">
                @foreach($messages as $message)
                    @if($message->user_id == $recruit->user_id)
                    <tr>
                        <td>
                            <div class="chat chat-start">
                                <div class="chat-header">{{$recruit->user()->name}}</div>
                                <div class="chat-bubble bg-cyan-200 text-black">{{$message->message}}</div>
                            </div>
                            <time class="text-xs opacity-50">{{$message->created_at}}</time>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>
                            <div class="chat chat-end">
                                <a class="link link-hover link-primary" href="{{route('users.show',$message->user_id);}}">
                                    <div class="chat-header">{{$message->user()->name}}</div>
                                </a>
                                <div class="chat-bubble bg-lime-200 text-black">{{$message->message}}</div>
                                <br>
                                <time class="text-xs opacity-50">{{$message->created_at}}</time>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class=" flex justify-center lg:w-2/3 mx-auto bg-gray-100 form-control my-4" >
            <form class=" flex justify-center" method="POST" 
                action="{{ route('messages.store',$recruit->id) }}">
                @csrf
                <input class="input input-bordered w-full" type="text" name="message">
                <input class="btn  btn-error bg-red-600 normal-case" type="submit" value="送信">
            </form>
        </div>
    </div>
@endsection