<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileEmployer extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'image',
        'cnpj',
        'phone',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
