<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    
    protected $table = "category";
    protected $primaryKey = 'id_category';

    public $timestamps = false;

    protected $fillable = [
        'id_category',
        'category_name'
    ];

    public function article_category()
    {
        return $this->hasOne(category::class, 'id_category', 'post_category_id');
    }
}
