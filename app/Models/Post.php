<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //eager loading
    protected $with = ['category', 'author'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author(){ //awalanya user, cuma mau diganti biar foreign keynya user_id tapi begitulah
        return $this->belongsTo(User::class, 'user_id');
    }

    

}
