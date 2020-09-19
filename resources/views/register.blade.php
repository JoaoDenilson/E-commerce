<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Ecommerce</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="list-products">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login"> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Cadastro</div>
                    <div class="card-body">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            @if($errors->all())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Nome">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="Senha">Senha</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="Phone">Telefone</label>
                                    <input type="text" class="form-control" name="phone"id="phone" placeholder="Telefone">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="CEP">CEP</label>
                                    <input type="number" class="form-control" name="cep"id="cep" placeholder="CEP">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Rua">Rua</label>
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Rua">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Bairro">Bairro</label>
                                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="Bairro">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="numberHome">N° Casa </label>
                                    <input type="number" class="form-control" id="numberHome" name="numberHome" placeholder="Ex:20">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="complement">Complemento * </label>
                                    <input type="text" class="form-control" id="complement" name="complement" placeholder="Ex: *Campo opcional">
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="Cidade">Cidade</label>
                                    <input type="text"  class="form-control" id="city" name="city" placeholder="Cidade">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="UF">UF</label>
                                    <input type="text"   class="form-control" id="uf" name="uf" placeholder="UF">
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary">Efetuar cadastro</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script type="text/javascript">
    $(function(){
        $("input[name=cep]").blur(function(){
            var cep = $(this).val().replace(/[^0-9]/, '');
            if(cep){
                var url = 'https://viacep.com.br/ws/'+cep+'/json/';
                $.ajax({
                    url: url,
                    dataType: 'json',
                    crossDomain: true,
                    contentType: "application/json",
                    success : function(json){
                        if(json.logradouro != ''){
                            $("input[name=street]").val(json.logradouro);
                        }
                        if(json.bairro != ''){
                            $("input[name=neighborhood]").val(json.bairro);
                        }
                        if(json.localidade != ''){
                            $("input[name=city]").val(json.localidade);
                        }
                        if(json.uf != ''){
                            $("input[name=uf]").val(json.uf);
                        }
                    }
                });
            }
        });
    });
</script>
</html>


