<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function log(Login $request)
    {
        $input = $request->validated();

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];

        if (!$token = \auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',

        ]);
    }

    public function insert()
    {

        $dados = file_get_contents("php://input");

        $dados = json_decode($dados);

        // $dados->nome = \filter_var($dados->nome);
        $dados->email = \filter_var($dados->email);
        $dados->password = \filter_var($dados->password);
        $dados->name = \filter_var($dados->name);

        if ($dados->email and $dados->password and $dados->name) {
            $insert = DB::table('users')->insert(['email' => $dados->email, 'password' => $dados->password, 'name' => $dados->name]);
        }
    }
}
