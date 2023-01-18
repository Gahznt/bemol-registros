<?php

namespace App\Http\Controllers;

use App\Models\CustomerServiceModel;
use Illuminate\Http\Request;
use Validator;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $validator = $this->validator($request->only(['user_id', 'message']));
        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $haveMessage = CustomerServiceModel::where('user_id', $request['user_id'])->where('finalized', 0)->first();

        if ($haveMessage) {
            $mymessages = json_decode($haveMessage['messages']);
            array_push($mymessages, ["name" => $request['message']]);
            $haveMessage->messages = json_encode($mymessages);
            $haveMessage->save();
        } else {
            $message = new CustomerServiceModel;
            $message->user_id = $request['user_id'];
            $message->messages = json_encode([["name" => $request['message']]]);
            $message->finalized = false;
            $message->save();
        }
        return response()->json(["success" => true, "message" => "Mensagem recebida"]);
    }

    public function find($id){
        $messages =  CustomerServiceModel::where('user_id', $id)->where('finalized', 0)->first();
        if($messages){
            return json_decode($messages->messages);
        }else{
            return [];
        }
    }


    public function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required'],
            'message' => ['required'],
        ]);
    }
}
