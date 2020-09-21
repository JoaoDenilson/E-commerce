<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('discount','>',0)->get()->toArray();
        //dd($product);
        return view('listProducts', ['products'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $product = Product::select('id','discount','name','valueProduct','url_image')->where('id','=',$id)->get()->toArray()[0];
            $product['quantityPurchased'] = 1;
            //($product);
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $carrinho = array();

            if( isset($_SESSION['carrinho']) ) {
                $carrinho = $_SESSION['carrinho'];
            } else {
                $_SESSION['carrinho'] = array();
                $carrinho = $_SESSION['carrinho'];
            }

            $idProductExist = $this->addCartIfExist($product, $_SESSION['carrinho']);
            //dd($idProductExist);
            if($idProductExist != -1){
                $carrinho[$idProductExist]['quantityPurchased'] +=1;
                return redirect()->route('cart');
            }
            $carrinho[] = $product;

            $_SESSION['carrinho'] = $carrinho;
            ($_SESSION['carrinho']);

            return redirect()->route('cart');
        }


        return redirect()->route('login')->withErrors(['É necessário login para adcionar item ao carrinho!']);
    }

    public function addCartIfExist($novoProduto, $carrinho){
        //dd($novoProduto, $carrinho);
        $search = array_filter($carrinho, function($detalhesProduto) use ($novoProduto){
            //dd($detalhesProduto);
            if(isset($detalhesProduto['id'])){
                return $detalhesProduto['id'] == $novoProduto['id'];
            }
            return ;
        }, ARRAY_FILTER_USE_BOTH);
        //dd($search);
        if (isset($search['id'])){
            return $search['id'];
        }
        return -1;
    }

    public function cart()
    {
        if(Auth::check()){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $user_id =  $_SESSION['user']['id'];
            $_SESSION['endereco'] = Address::where('user_id','=',$user_id)->get()->toArray();
            return view('cart');
        }

        return redirect()->back()->withInput()->withErrors(['É necessário login para está ação!']);
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
