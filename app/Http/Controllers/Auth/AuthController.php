<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['O email informdo não é válido.']);
        }
        //var_dump($request->all());
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('list-products');
        }

        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem !']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('list-products');
    }

    public function login()
    {
        return view('singIn');
    }

    public function formRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $address = new Address();

        $validation = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'cep' => 'required',
                'phone' => 'required',
                'street' => 'required',
                'neighborhood' => 'required',
                'city' => 'required',
                'uf' => 'required',
                'numberHome' => 'required',
            ],
            [
                'name.required' => 'O NOME é obrigatório.',
                'email.required' => 'O EMAIL é obrigatório.',
                'password.required' => 'A SENHA é obrigatório.',
                'phone.required' => 'O TELEFONE é obrigatório.',
                'cep.required' => 'O CEP é obrigatório.',
                'street.required' => 'A RUA é obrigatória.',
                'neighborhood.required' => 'O BAIRRO é obrigatório.',
                'city.required' => 'A CIDADE é obrigatória.',
                'uf.required' => 'O UF é obrigatório.',
                'numberHome.required' => 'O NUMERO DA CASA/PRÉDIO é obrigatória.',
            ]
        );

        if($validation->fails()){
                //return redirect()->back()->withInput()->withErrors(['Dados não conferem.']);
                //dd($validation);
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validation)
                ->header('accept','application/json');
        }

        //Usando uma transação para cadastrar o usuário.
        DB::transaction(function () use ($request, $user, $address){
            //Cadastrando usuário
            //$user = User::create(request(['name', 'email', 'phone', 'password']));
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->save();
            //Retornando ID
            $user_id = $user->id;

            //Cadastrando o endereço
            $address->cep = $request->cep;
            $address->street = $request->street;
            $address->neighborhood = $request->neighborhood;
            $address->city = $request->city;
            $address->uf = $request->uf;
            $address->numberHome = $request->numberHome;
            $address->complement = $request->complement	;
            $address->user_id = $user_id;
            //dd($request);
            $address->save();

        });

        if (!$user->id){
            return redirect()->back()->withInput()->withErrors(['Erro ao realizar cadastro, tente novamente']);
        }

        return redirect('login');

    }
}
