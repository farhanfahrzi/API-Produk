<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function categories()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    /**
     * Mendapatkan identifier yang akan digunakan dalam token JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Biasanya menggunakan primary key (ID) user
    }

    /**
     * Mendapatkan klaim khusus JWT yang ingin dimasukkan.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return []; // Bisa mengembalikan data tambahan untuk dimasukkan ke dalam token
    }
}
