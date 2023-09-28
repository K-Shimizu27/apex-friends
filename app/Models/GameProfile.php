<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'game_id',
        'rank',
        'kd',
        'damage',
        'platform',
        'character' ,
    ];
    
    /**
     * このプロフィールを所有するユーザ
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
