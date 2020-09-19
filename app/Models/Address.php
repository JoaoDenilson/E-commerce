<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'uf',
        'neighborhood',
        'numberHome',
        'cep',
        'complement',
        'user_id'
    ];


    //Relacionamentos
    //1 endereço pertece a 1 usuário
    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    //1 endereço pode está em n pedidos.
    public function Orders(){
        return $this->hasMany('App\Models\Order');
    }
}
