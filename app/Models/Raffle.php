<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Raffle extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "raffles";
    protected $primaryKey = "id";

    protected $fillable = ['user_id', 'contest_id'];

    public function user(): HasOne 
    {
        return $this->hasOne(User::class, "user_id");
    }
}
