<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    public $timestamps = false;

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
        return $this->hasOne(post::class, 'id_post', 'comment_post_id');
    }
}
