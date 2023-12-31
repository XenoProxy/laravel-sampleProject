<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductUser;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'price'
    ];   
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_product')
        ->withPivot('isLiked');
    }
}
