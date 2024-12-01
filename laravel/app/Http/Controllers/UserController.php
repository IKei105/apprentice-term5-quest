<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function getSignUp()
    {
        $errors = ['email' => '', 'password' => ''];
        return view('signup')->with(['errors' => $errors]);
    }

    public function getSignIn()
    {
        $error= '';
        return view('signin')->with(['error' => $error]);
    }

    public function signUp(Request $request)
    {
        //入力されたemailがdbに存在するか確認するコード
        $check = UserInfo::where('email', $request->email)->first();

        if (!($this->formInputCheck($request->email)) and !($this->formInputCheck($request->password))) 
        {
            $errors['email'] = '正しく入力してください';
            $errors['password'] = '正しく入力してください';

            return view('signup')->with(['errors' => $errors]);

        } elseif (!($this->formInputCheck($request->email))) {

            $errors['email'] = '正しく入力してください';
            $errors['password'] = '';

            return view('signup')->with(['errors' => $errors]);

        }  elseif (!($this->formInputCheck($request->password))) {

            $errors['password'] = '正しく入力してください';
            $errors['email'] = '';

            return view('signup')->with(['errors' => $errors]);

        }elseif($check) {

            $errors['email'] = '入力されたメールアドレスは既に存在します。';
            $errors['password'] = '';

            return view('signup')->with(['errors' => $errors]);

        } else {
            //登録を進める
            $newUser = new UserInfo();

            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);

            $newUser->save(); //この書き方で主キーの取得ができる
            session(['user_id' => $newUser->id]);

            return redirect()->route('home');
        }
    }

    public function signIn(Request $request)
    {
        $check = UserInfo::where('email', $request->email)->first();

        if($check and Hash::check($request->password, $check->password)) {

            //存在したらログイン成功
            session(['user_id' => $check->id]);

            return redirect()->route('home');

        } elseif (!($this->formInputCheck($request->email)) and !($this->formInputCheck($request->password))){

            $errors = 'メールアドレスまたはパスワードが間違っています。';

            return view('signup')->with(['errors' => $errors]);

        } elseif (!($this->formInputCheck($request->email))){

            $errors = '正しく入力してください';

            return view('signup')->with(['errors' => $errors]);

        } elseif (!($this->formInputCheck($request->password))){

            $errors = '正しく入力してください';

            return view('signup')->with(['errors' => $errors]);

        } else {
            //ログイン不可能でもう一度サインインページへ遷移しパスワードもしくはメールアドレスが間違えています
            $errors = 'メールアドレスまたはパスワードが間違っています。';
            return view('signup')->with(['errors' => $errors]);
        }
    }
    
    public function reset()
    {
        session()->flush();
        return redirect()->route('home');
    }

    public function formInputCheck($str)
    {
        //送信された値が存在しているなおかつ1文字以上ならtrueを返します。
        if ((preg_match('/^[a-zA-Z0-9]+$/', $str)) and (strlen($str) > 0)) {
            return true;
        } else {
            return false;
        }
    }
    
}
