<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'role',
        'description',
        'tech_stack',
        'github_url',
        'demo_url',
    ];

    /**
     * Relasi ke Model User (1 Project dimiliki oleh 1 User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
