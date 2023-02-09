<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>

<body>
<style>

.contatos{
display: flex;
flex-direction: column;
gap: 5px;
/* border:solid 1px ;  */
}
.contato{
display: flex;
border:solid 1px ;
margin-top: 10px;
padding: 1rem;
}

    </style>    

<?php
     $dados = DB::table('contatos')->get()     
?>

<div class="contatos">
    <h1><strong>Fevererio</strong></h1>
    @foreach ($dados as $item)
@if ($item->date = (2023/02))
<div class="contato">
    <p><strong>Nome:</strong>  {{$item->nome}}</p>
    <p><strong>Email:</strong>  {{$item->email}}</p>
    <p><strong>Telefone:</strong>  {{$item->telefone}}</p>
</div>
    @endif
    @endforeach
</div>


</body>
</html>