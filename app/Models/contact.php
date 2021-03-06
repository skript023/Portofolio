<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_contact',
        'name',
        'email',
        'message',
        'date'
    ]; 
}
