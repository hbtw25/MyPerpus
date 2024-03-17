<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $guarded = ["id_user"];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'born' => 'date',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, "created_by", "id_user");
    }
}
