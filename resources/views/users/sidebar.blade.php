<div class="drawer-side">
    <label for="my-drawer-2" class="drawer-overlay"></label> 
    <ul class="menu w-60 bg-white text-base-content h-full">
        <!-- Sidebar content here -->
        <li>
            <a class="text-black {{url()->current() == route('users.info',$user->id) ? 'bg-red-200 ':' '}}" 
                href="{{route("users.info",$user->id)}}">ユーザ情報</a> 
        </li>
        <li>
            <a class="text-black {{url()->current() == route('users.gameprofile',$user->id) ? ' bg-red-200':' '}}" 
                href="{{route("users.gameprofile",$user->id)}}">ゲームプロフィール</a>
        </li>
        <li>
            <a class="text-black {{url()->current() == route('users.recruit',$user->id) ? ' bg-red-200':' '}}" 
                href="{{route("users.recruit",$user->id)}}">自分の募集</a>
        </li>
    </ul>
</div>