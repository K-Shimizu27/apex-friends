<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use Illuminate\Support\Facades\Auth;

class Recruit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "title",
        "mode",
        "cross_play",
        "play_style",
        "vc",
        "comment"
    ];

    /**
     * この募集を所有するユーザ
     */
    public function user()
    {
        return DB::table('users')->where('id', $this->user_id)->first();
    }
    
    /**
     * この募集が所有するメッセージ
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
        // return DB::table('messages')->where('recruit_id', $this->id);
    }
}
