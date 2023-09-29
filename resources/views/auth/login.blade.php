@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center my-4">
        <h1 id="title">ApexFriends</h1>
    </div>
    <div class="flex justify-center my-4">
            <form method="POST" action="{{ route('login') }}" id="body">
                @csrf
                <div class="form-control ">
                    <table class="my-4">
                        
                        <tr>
                            <th>
                                <label for="email" class="label">メールアドレス：</label>
                            </th>
                            <td>
                                <input type="email" name="email" class="input input-bordered w-full text-black">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="password" class="label">パスワード：</label>
                            </th>
                            <td>
                                <input type="password" name="password" class="input input-bordered w-full text-black">
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="btn btn-error bg-red-600 btn-block normal-case w-full">ログイン</button>
    
                {{-- ユーザ登録ページへのリンク --}}
                <p class="mt-2">アカウントをお持ちでない方は<a class="link link-hover link-primary" href="{{ route('register') }}">こちら</a></p>
                   
            </form>
        </div>
    </div>
@endsection