<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Usuario/perfil');
    }

    public function listado()
    {   
        $usuarios = User::all();

        return view('Usuario/usuarios', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosActualizar = $request;
        $user = User::find($id);

        if($user)
        {

            if($datosActualizar['name'] != $user->name){
                $user->name = $datosActualizar['name'];
            }

            if($datosActualizar['email'] != $user->email){
                $user->email = $datosActualizar['email'];
            }

            if($datosActualizar['dni'] != $user->dni){
                $user->dni = $datosActualizar['dni'];
            }

            if($datosActualizar['nacimiento'] != $user->fecha_nacimiento){
                $user->fecha_nacimiento = $datosActualizar['nacimiento'];
            }

            $user->save();
            $mensaje['texto'] = "Se actualizaron los datos correctamente";
            $mensaje['valor'] = true;
            return view('mensajes', ['mensaje' => $mensaje]);
        }
        else
        {
            $mensaje['texto'] = "No se encontro el usuario";
            $mensaje['valor'] = false;
            return view('mensajes', ['mensaje' => $mensaje]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
