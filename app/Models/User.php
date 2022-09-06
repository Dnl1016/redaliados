<?php

namespace App\Models;

use App\Models\Ally;
use App\Models\People;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USUARIO_VERIFICADO = "1";
    const USUARIO_NO_VERIFICADO = "0";

    const USUARIO_ADMINISTRADOR = "true";
    const USUARIO_REGULAR = "false";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nick',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
        'people_id',
        'status',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verification_token',
        'remember_token',
    ];



    public function esVerficado()
    {
        return $this->Verified ==User::USUARIO_VERIFICADO;
    }
    public function esAdministrador()
    {
        return $this->Verified ==User::USUARIO_ADMINISTRADOR;
    }
    public static function generarVerificationToken()
    {
        return Str::random(40);
    }

    protected $table = 'people';

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id'); // Relationship one to one  (inverse)/Belongs to
    }

    public function allies()
    {
        return $this->belongsTo(Ally::class); // Relationship One To Many (inverse)/Belongs to
    }
}
