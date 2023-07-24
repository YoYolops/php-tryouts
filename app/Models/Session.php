<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;

class Session extends Model
{
    use HasFactory;
    protected $table = "sessions";
    protected $primaryKey = "id";

    protected $fillable = ['token', 'user_id'];

    public function user(): HasOne 
    {
        return $this->hasOne(User::class, "user_id");
    }
}