<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestimonyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class, 'testimony_type_id', 'id');
    }
}
