<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $primaryKey = 'id';
    
    protected $fillable= [
        'title', 
        'content',
        'image',
        'user_id',
        'category_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
