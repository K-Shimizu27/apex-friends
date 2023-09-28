<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する募集
     */
    public function recruit()
    {
        return $this->hasOne(Recruit::class);
    }
    
    /**
     * このユーザのゲームプロフィール
     */
    public function gameprofile()
    {
        return $this->hasOne(GameProfile::class);
    }
    
    /**
     * このユーザのメッセージ(一対多)
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    /**
     * このユーザのプロフィール入力フラグを更新
     */
    public function update_flag()
    {
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['profile_flag' => '1']);
        
        return;
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('recruit');
    }
}
