<?php

namespace App\Http\Controllers\back;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use Session;

class authController extends Controller
{

    public function index()
    {
        if(session('auth')==True){
            echo "login";
            return redirect('/panel/dashboard');
        }
        return view('back.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        $data = User::where('email', $request->email)->first();
        if($data){
            if(Hash::check($request->password, $data->password)){
                session([
                    'id'                => $data->id,
                    'name'              => $data->name,
                    'auth'              => True
                ]);
                return redirect('/panel/dashboard');
            }
        }
        return redirect('login')->with('danger', 'Email atau Password Salah!!!');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->to('login');
    }
}
