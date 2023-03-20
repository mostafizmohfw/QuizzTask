<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_questions',
        'total_marks',
        'archived_marks',
        'points',
    ];

    public function storeResult(array $input) {
        return self::query()->create($input);
    }
}
