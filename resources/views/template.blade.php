<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <title>Atena Gestão</title>


</head>

<body class="bg-secondary">
    <header>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
          <!-- Brand -->
          <a class="navbar-brand" href="/index">Gestão</a>

          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar" >
            <ul class="navbar-nav ">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastro</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('cadastros.clientes')}}">Clientes</a>
                    <a class="dropdown-item" href="#">Serviços</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Atendimento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Relatórios</a>
            </li> 
        </ul>
    </div> 
    <span class="navbar-text">
   Herbet Junior
  </span>

</nav>
</header>
@yield('conteudo')


</body>
</html>