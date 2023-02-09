<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContatosController extends Controller
{
    public function api()
    {
        $get = DB::table('contatos')->get();

        print_r(json_encode($get));
    }




    public function insert()
    {
        $dados = file_get_contents("php://input");

        $dados = json_decode($dados);

        $dados->img = filter_var($dados->img);

        \print_r($dados->img);

        // if ($dados->img) {
        //     $formatos = array('jpg', 'png', 'svg', 'gif');
        //     $extencao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        //     if (in_array($extencao, $formatos)) {
        //         $pasta = "arquivos/";
        //         $temporario = $_FILES['file']['tmp_name'];
        //         $newName = uniqid() . ".$extencao";
        //         $enviar = DB::table('contatos')->insert(['img' => $newName]);
        //         if (move_uploaded_file($temporario, $pasta . $newName)) {
        //             return \redirect('/');
        //         }
        //     }
        // }

        $dados->nome = \filter_var($dados->nome);
        $dados->email = \filter_var($dados->email);
        $dados->telefone = \filter_var($dados->telefone);
        $dados->date = \filter_var($dados->date);

        \print_r($dados);

        if ($dados->nome and $dados->email and $dados->telefone) {
            $insert = DB::table('contatos')->insert(['nome' => $dados->nome, 'email' => $dados->email, 'telefone' => $dados->telefone, 'date' => $dados->date]);
        }
    }
    public function delete($id)
    {
        $deleted = DB::table('contatos')->where('id', $id)->delete();
    }
    public function update($id)
    {
        $dados = file_get_contents("php://input");

        $dados = json_decode($dados);

        $dados->nome = \filter_var($dados->nome);
        $dados->email = \filter_var($dados->email);
        $dados->telefone = \filter_var($dados->telefone);
        $dados->date = \filter_var($dados->date);


        if ($dados->nome and  $dados->email and $dados->telefone) {
            $update = DB::table('contatos')->where('id', $id)->update(['nome' => $dados->nome, 'email' => $dados->email, 'telefone' => $dados->telefone, 'date' => $dados->date]);
        }
    }
}
