@extends('layouts.app')

@section('content')

    <div class="text-sm breadcrumbs justify-items-start">
        <ul>
            <li><a href="{{route("dashboard")}}">ホーム</a></li> 
            <li><a href="javascript:history.back()">マイページ</a></li>
            <li>ユーザー情報編集</li>
        </ul>
    </div>
    @if (Auth::id() == $user->id)
        
        <div class="prose mx-auto text-center my-4">
            <h1 class="text-white">ユーザ情報編集</h1>
        </div>
        <div class="flex justify-center my-4 ">
            <form enctype="multipart/form-data" method="POST" action="{{ route('users.update',$user->id) }}" id="body">
                @csrf
                {{-- アイコン設定 --}}
                <div class="form-control my-4">
                    <img src="{{ \Storage::url($user->icon) }}" alt="icon" width="10%"/>
                    <input type="file" name="icon" class="file-input file-input-bordered w-full max-w-xs" accept="image/*" />
                </div>
                
                {{-- ユーザー名設定 --}}
                <div class="form-control my-4">
                    <label for="name" class="label">ユーザ名：</label>
                    <input type="text" name="name" class="input input-bordered w-full" value="{{$user->name}}">
                </div>
                
                {{-- メールアドレス設定 --}}
                <div class="form-control my-4">
                    <label for="email" class="label">メールアドレス：</label>
                    <input type="text" name="email" class="input input-bordered w-full" value="{{$user->email}}">
                </div>

                <button type="submit" class="btn btn-ghost bg-red-600 btn-block normal-case">更新</button>
            </form>
        </div>
    
    @endif
@endsection