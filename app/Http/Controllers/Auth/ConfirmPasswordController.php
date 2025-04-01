<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use App\Models\User;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirm(Request $request){

        $user = User::find($request->id);

        if($user)
        {
            return view('auth/passwords/newPass');
        }
        else
        {
            $mensaje['texto'] = "Error no existe el usuario";
            $mensaje['valor'] = false;
            return view('mensajes', ['mensaje' => $mensaje]);
        }
    }

    public function actualizar(Request $request){

        $user = User::find($request->id);

        if($user){
           
            $user->password = $request->password;
            $user->save();

            $mensaje['texto'] = "Se actualizo su contraseña correctamente";
            $mensaje['valor'] = true;
            return view('mensajes', ['mensaje' => $mensaje]);
        }else{
            $mensaje['texto'] = "No se encuentra un usuario";
            $mensaje['valor'] = false;
            return view('auth/passwords/newPass', ['mensaje' => $mensaje]);
        }
    }
}
