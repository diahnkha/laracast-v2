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

    public function scopeFilter($query, array $filters){
        // if ($filters['search'] ?? false){
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //          ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query
                ->where('title', 'like', '%' . $search . '%')
                 ->orWhere('body', 'like', '%' . $search . '%')         
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author(){ //awalanya user, cuma mau diganti biar foreign keynya user_id tapi begitulah
        return $this->belongsTo(User::class, 'user_id');
    }

    

}
