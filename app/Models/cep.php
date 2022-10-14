<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cep extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep'
    ];

    public function user()
    {
        return $this->morphTo(User::class, 'id');
    }
}
