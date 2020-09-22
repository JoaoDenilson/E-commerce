<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderProductController extends Controller
{
    private $id_lastWish = 0;
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('makePurchase');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['carrinho'])){
                if (!empty($_SESSION['carrinho'])){
                    $user_id = $_SESSION['user']['id'];
                    //dd($_SESSION['endereco']);
                    $address_id = $_SESSION['endereco'][0]['id'];
                    $carrinho = $_SESSION['carrinho'];

                    //dd($address_id, $user_id,$carrinho);

                    $order = new Order();
                    //Vai receber o id do ultimo PEDIDO.

                    //Usando uma transação para cadastrar o usuário.
                    DB::transaction(function () use ($order, $user_id, $address_id, $carrinho){
                        $order->user_id = $user_id;
                        $order->address_id = $address_id;
                        $order->save();
                        //Retornando ID
                        $order_id = $order->id;

                        foreach ($carrinho as $aux){
                            //Registrar valor com desconto
                            $n = $aux['discount'].'0.0';
                            $pctm = floatval($n);
                            $valorQuantity = $aux['valueProduct'] * $aux['quantityPurchased'];
                            $valorProduto = $valorQuantity - ( $valorQuantity / 100 * $pctm);

                            DB::table('orders_products')->insert([[
                                'valueUnit' => $valorProduto,
                                'quantityProduct' =>$aux['quantityPurchased'],
                                'order_id' => $order_id,
                                'product_id' => $aux['id']
                            ]]);
                        }

                        $this->id_lastWish = $order_id;
                        //dd($id_lastWish);
                        //Limpando o carrinho
                        unset($_SESSION['carrinho']);
                    });

                    $orderProductsRequest = DB::table('products')
                        ->join('orders_products', function ($join) {
                            $join->on('products.id', '=', 'orders_products.product_id')
                                ->where('orders_products.order_id', '=', $this->id_lastWish);
                        })
                        ->get()->toArray();

                    //$valueCompra = DB::table('orders_products')->where('order_id','=',$this->id_lastWish)->first();

                    //dd($orderProductsRequest, $this->id_lastWish);
                    //Enviar dados para a View
                    return view('makePurchase', [
                        'pedido'=> $orderProductsRequest,
                    ]);
                }
            }
            return redirect()->back()->withInput()->withErrors(['Erro ! Compara NÃO REALIZADA.']);
        }
        return redirect()->route('/list-products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
