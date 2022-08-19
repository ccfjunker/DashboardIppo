<?php

namespace App;

use App\Model\Pessoa\Pessoa;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pessoa', 'id_empresa', 'password', 'api_tpken', 'email'
    ];

    protected $attributes = [
        'id_pessoa', 'id_empresa', 'password', 'api_tpken', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pessoa(){
        return $this->belongsTo('App\Model\Pessoa\Pessoa', 'id_pessoa');
    }

    public function empresa(){
        return $this->belongsTo('App\Model\Empresa\Empresa', 'id_empresa');
    }

    public function getEmailAttribute($value)
    {
        return $this->pessoa()->email;
    }

    public static function inserirArray(array $data){
        $pessoa = Pessoa::inserirArray($data);
        return self::create([
            'id_pessoa'=>$pessoa->id,
            'password' => Hash::make($data['password']),
            'api_token' => Hash::make($data['email'].time())
        ]);
    }
}
