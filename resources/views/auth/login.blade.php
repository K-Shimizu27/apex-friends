@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center my-4">
        <h1 id="title">ApexFriends</h1>
    </div>
    <div class="flex justify-center my-4">
            <form method="POST" action="{{ route('login') }}" class="w-1/2">
                @csrf
                <div class="form-control my-4">
                    <label for="email" class="label ">
                        <span class="label-text text-white">メールアドレス：</span>
                    </label>
                    <input type="email" name="email" class="input input-bordered w-full text-black">
                </div>
                <div class="form-control my-4">
                    <label for="password" class="label">
                        <span class="label-text text-white">パスワード：</span>
                    </label>
                    <input type="password" name="password" class="input input-bordered w-full text-black">
                </div>
     
                <button type="submit" class="btn btn-error bg-red-600 btn-block normal-case w-full">ログイン</button>
    
                {{-- ユーザ登録ページへのリンク --}}
                <p class="mt-2">アカウントをお持ちでない方は<a class="link link-hover link-primary" href="{{ route('register') }}">こちら</a></p>
                   
            </form>
        </div>
    </div>
@endsection