<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //public $timestamps = true;

    //Relacionamentos
    //1 pedido pertece a 1 usuário
    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    //1 pedido tem a 1 endereço
    public function Addresses(){
        return $this->belongsTo('App\Models\Address');
    }

    //1 pedido pode ter N produtos
    public function Products(){
        return $this->belongsToMany('App\Models\Product','orders_products', 'order_id', 'product_id')
        ->withPivot('valueUnit', 'quantityProduct');
    }
}
