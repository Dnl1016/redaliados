<?php

namespace App\Models;

use App\Models\Ally;
use App\Models\People;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use  HasFactory, Notifiable, SoftDeletes;

    const USUARIO_VERIFICADO = "1";
    const USUARIO_NO_VERIFICADO = "0";

    const USUARIO_ADMINISTRADOR = "true";
    const USUARIO_REGULAR = "false";

    protected $table = 'users';
    protected $dates=['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
        'people_id',
        'allies_id',
        'status',
        
    ];

    public function setNameAttribute($valor)
    {
        $this->attributes['name'] = strtoupper($valor);
    }
    public function getNameAttribute($valor)
    {
        return mb_strtoupper($valor);
    }


    public function setEmailAttribute($valor)
    {
        $this->attributes['email'] = strtolower($valor);
    }


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

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function esVerificado()
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

    public function people()
    {
        return $this->belongsTo(People::class, 'people_id'); // Relationship one to one  (inverse)/Belongs to
    }

    public function allies()
    {
        return $this->belongsTo(Ally::class); // Relationship One To Many (inverse)/Belongs to
    }
}
