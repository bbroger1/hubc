<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAdm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'cpf',
        'birthday',
        'phone',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
