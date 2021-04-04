<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function postlogin(Request $request){
       // Auth::guard('backend')->attempt(['username' => $request->username, 'password' => $request->password], true);
    //    echo $request->username;
    //    echo $request->password;
        if(Auth::guard('backend')->attempt(['username' => $request->username, 'password' => $request->password], true)){
            
            //view('pages.home',['user' => Auth::user()]);
            $name = Auth::guard('backend')->user()->username;
            view('pages.home',['username' => $name]);
            return redirect()->route('home.index')->with('notification','Wellcome');
        }else {
            return redirect()->route('login')->with('notification','Sai tên đăng nhập hoặt mật khẩu!');
        }
    }

    public function register(){
        return view('pages.register');
    }
    public function postregister(Request $request){
        $this->validate($request,
        [
            'username' => "unique:user_models,username",
        ],[
            'username.unique' => 'Tên Đăng nhập đã tồn tại',
            'password.confimed' => 'Nhập sai khi xác nhận mật khẩu',
        ]);
        $data = new UserModel();
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        
        // $request->UserModel()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();



        $data->save();
        return redirect()->route('login')->with('notification','Đăng ký thành công, giờ bạn có thể đăng nhập');
    }
    
}
