<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        $data = $request->only([
            'name',
            'email',
            'password',
            'username',
            'cpf',
            'phone',
            'cep',
            'city',
            'state'
        ]);

        $validator = $this->validator($data);
        if($validator->fails()){
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                toastr()->error ( $message, 'Erro');
            }

            return redirect()->route('registro')
            ->withErrors($validator)
            ->withInput();
        }
        $user = $this->create($data);
        
        toastr()->success('The user has been successfully registered', 'Success!');
        return redirect()->route('home');

    }

    public function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'username' => ['required', 'string', 'unique:users'],
            'cpf' => ['required', 'string', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'cep' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
        ]);
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'cpf' => $data['cpf'],
            'phone' => $data['phone'],
            'cep' => $data['cep'],
            'city' => $data['city'],
            'state' => $data['state']
        ]);
    }
}
