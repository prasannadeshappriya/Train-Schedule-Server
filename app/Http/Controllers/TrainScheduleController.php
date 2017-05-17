<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Hash;

class TrainScheduleController extends Controller
{
    public function index(){
        $session = new Session();
        if($session->has('status')){
            if($session->get('status')==='login'){
                return redirect('dashboard');
            }
        }
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

    public function dashboard(){
        $sql = "SELECT * FROM feedback WHERE 1";
        $result = DB::select($sql);
        $arrResult = [];
        foreach ($result as $row){
            $arrResult[] = (array)$row;
        }
        return view('dashboard',compact('arrResult'));
    }

    public function login(Request $request){
        $this -> validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $sql = "SELECT * FROM user WHERE 1";
        $result = DB::select($sql);

        $arrResult = [];
        foreach ($result as $row){
            $arrResult[] = (array)$row;
        }

        $username = $arrResult[0]['username'];
        $password = $arrResult[0]['password'];

        if($request['username']===$username){
            if (Hash::check($request['password'], $password)) {
                $session = new Session();
                $session->set('status','login');
                $session->set('username',$username);
                return redirect('dashboard');
            }else{
                return redirect('login')
                    ->with('error','Username or password is wrong!')
                    ->withInput($request->except('password'));
            }
        }else{
            return redirect('login')
                ->with('error','Username or password is wrong!')
                ->withInput($request->except('password'));
        }
    }

    public function logout(Request $request){
        $session = new Session();
        if($session->has('username')){
            $username = $session->get('username');
            $session->clear();
            $request->flush();
            return redirect('login')
                ->withInput(['username'=>$username]);
        }else{
            $session->clear();
            $request->flush();
            return redirect('login');
        }

    }

}
