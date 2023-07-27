<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    protected $table = "contests";
    protected $primaryKey = "id";

    protected $fillable = ['name', 'user_id', 'price', 'image'];

    public function user(): HasOne 
    {
        return $this->hasOne(User::class, "user_id");
    }
}
