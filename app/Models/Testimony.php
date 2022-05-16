<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimony extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'testimony_type_id',
        'test_title',
        'test_body'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestimonyType::class, 'testimony_type_id', 'id');
    }
}
