<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table        = 'tb_akses';
    protected $primaryKey   = 'id_akses';
    protected $fillable = [
        'nama', 'email', 'no_hp', 'username', 'password', 'level', 'id_group', 'id_dir', 'id_subdir', 'prov', 'prov_handle', 'direktorat_handle', 'kab', 'kdsatker'
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
        'prov_handle'       => 'array',
        'direktorat_handle' => 'array'
    ];

    public function getDetail($id_akses)
    {
        $user = $this->find($id_akses);
        $user->direktorat = $this->find($id_akses)->direktorat;

        return $user;
    }
    public function direktorat()
    {
        return $this->hasOne('App\Direktorat', 'id_dir', 'id_dir');
    }
}
