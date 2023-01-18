<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getUser($id){
        $user = User::where('email', $id)->orWhere('phone', $id)->orWhere('username', $id)->orWhere('cpf', $id)->first();
        if($user){
            return response()->json($user);
        }else{
            return response()->json('');
        }
    }

    public function cep($cep){
        try {
            $json = file_get_contents('https://viacep.com.br/ws/'. $cep . '/json/');
            $jsonToArray = json_decode($json);
            if(isset($jsonToArray) && $jsonToArray['erro']){
                return response()->json("error");
            }
            return $jsonToArray;
        } catch (\Throwable $th) {
            return response()->json("error");
        }

    }
}
