<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = ["recruit_id","user_id","message"];
    
    /**
     * このメッセージを所有するユーザ
     */
    public function user()
    {
        return DB::table('users')->where('id', $this->user_id)->first();
    }
    
    /**
     * このメッセージを所有する募集
     */
    public function recruit()
    {
        return $this->hasOne(Recruit::class);
    }
}
