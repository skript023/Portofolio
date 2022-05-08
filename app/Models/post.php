<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_posts',
        'post_id_user',
        'post_title',
        'post_image',
        'post_description',
        'post_date',
        'post_status',
        'post_category_id'
    ];

    public function article_creator()
    {
        return $this->hasOne(User::class, 'id_user', 'post_id_user');
    }

    public function article_category()
    {
        return $this->hasOne(category::class, 'id_category', 'post_category_id');
    }

    public function article_comment()
    {
        return $this->hasOne(comment::class, 'comment_post_id', 'id_posts');
    }
}
