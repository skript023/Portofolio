<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id_comments';

    protected $fillable = [
        'id_comments',
        'comment_post_id',
        'comment_name',
        'comment_email',
        'comment_description',
        'comment_date',
        'comment_status'
    ];

    protected $casts = [
        'comment_date' => 'datetime',
    ];

    public function article_comment()
    {
        return $this->belongsTo(post::class);
    }

    public function article_creator()
    {
        return $this->hasOne(User::class, 'id_user', 'post_id_user');
    }
}
