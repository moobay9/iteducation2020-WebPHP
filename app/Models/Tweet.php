<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * アクティブユーザーのみを含むようにクエリのスコープを設定
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeTimeline($query, $user)
    {
        $follows = [];
        foreach ($user->follow as $follow) {
            $follows[] = $follow->relation_user_id;
        }
        
        $query->where('user_id', $user->id)
            ->orWhereIn('user_id', $follows)
            ->orderBy('id', 'desc');
    }
}
