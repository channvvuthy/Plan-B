<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class LoginController extends Controller
{
    /*
     * Login function
     */
    public function getLogin(Request $request){
        return view("login.login");
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->status !="1"){
                Auth::logout();
                return redirect()->back()->withInput()->withErrors(['email'=>'Your account has been disabled']);
            }
            foreach(Auth::user()->roles as $role){
                if($role->permission=='admin'){
                    return redirect()->route('adminManage');
                }elseif($role->permission=='manager'){
                    return redirect()->route('manager');
                }elseif($role->permission=='leader'){
                    return redirect()->route('leader.index');
                }elseif($role->permission=='member'){
                    return redirect()->route('member.index');
                }
            }

        }else{
            return redirect()->route('login')->withInput()->withErrors(['email'=>'Incorrect Username or Password']);
        }


    }


}
