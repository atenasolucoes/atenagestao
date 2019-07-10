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

<body class="bg-secondary" style="padding: 10%">
   
<div class="text-white" style="background-color: rgba(0,0,0,0.4);">
    <form style="padding: 10%;" class="text-center" method="post" action="{{route('login')}}">
        {{@csrf_field()}}
        <h1>ATENA GESTÃO</h1>
        <div class="form-group">
            <input type="text" name="email" class="form-control text-center" placeholder="Informe Usuário">
        </div>
        <div class="form-group">
            <input type="password" name="senha" class="form-control text-center" placeholder="Informe Senha">
        </div>
        <button class="btn btn-block btn-dark"> ENTRAR</button>
    </form>
</div>


</body>
</html>
