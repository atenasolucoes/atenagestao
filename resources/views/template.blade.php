<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control"   content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/estilo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <title>Atena Gestão</title>


</head>

<body class="bg-secondary mb-5">
    <header>
        <div class="text-right bg-secondary text-white p-2"> 
   <b>Usuário: </b>Herbet Junior | <a href="#">Sair</a> 
  </div>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
          <!-- Brand -->
          <a class="navbar-brand" href="{{route('index')}}">Gestão</a>

          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar" >
            <ul class="navbar-nav ">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('cadastros.clientes')}}">Clientes</a>
                    <a class="dropdown-item" href="{{route('cadastros.servicos')}}">Serviços</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atendimento</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('cadastros.clientes', 'pre-cadastro')}}">Pré-Cadastro</a>
                    <a class="dropdown-item" href="{{route('orcamento.orcamentos')}}">Orçamentos</a>
                    <a class="dropdown-item" href="#">Projetos</a>
                    <a class="dropdown-item" href="#">Anotações</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Midias Socias</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Planejamento</a>
                    <a class="dropdown-item" href="#">Publicações</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Relatórios</a>
            </li> 
             <li class="nav-item">
                <a class="nav-link" href="#">Configurações</a>
            </li> 
        </ul>
    </div> 
   
</nav>
</header>

</div>
@yield('conteudo')


<footer class="text-center bg-dark text-white mt-5 fixed-bottom">
    <p>Atena Agência - Solucões Criativas {{date('Y')}}</p>
</footer>
</body>
</html>
