<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'short_desc', 'long_desc', 'first_li', 'second_li'
    ];
}
