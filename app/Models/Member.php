<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'image'
    ];

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class, 'member_id', 'id');
    }
}
