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

    
}
