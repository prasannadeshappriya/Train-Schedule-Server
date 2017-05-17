<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainScheduleController extends Controller
{
    public function index(){
        return view('login');
    }

    public function insertFeedback(Request $request){
        $rules = [
            'email'=>'required',
            'message'=>'required',
            'token'=>'required'
        ];
        $this->validate($request,$rules);

        $email = $request['email'];
        $message = $request['message'];
        $token = $request['token'];

        $sql = "INSERT INTO feedback (email,message)  VALUES (?,?)";
        DB::insert($sql,[$email,$message]);

        $response = new JsonResponse();
        $response->setData(
            ['status'=>'successful']
        );
    }

}
