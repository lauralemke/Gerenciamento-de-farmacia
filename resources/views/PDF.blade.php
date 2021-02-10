<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    @foreach ($cliente as $item)
    <a>Nome: </a><a >{{$item->nome}}</a> <br>
   <a>CPF:</a> <a title='CPF:'>{{$item->cpf}}</a> <br>
   <a>Data de nascimento: </a> <a Data de nascimento:>{{$item->data_nascimento}}</a><br><br>
    @endforeach
</body>
</html>