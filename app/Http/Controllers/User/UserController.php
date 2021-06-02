<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->showAll($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre_usuario' => 'required',
            'persona_id' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'cargo_usuario' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['estado'] = false;

        $data['password'] = bcrypt($request->password);
        $data['remember_token'] = User::generarVerificationToken();

        $user = User::create($data);

        return $this->showOne($user, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $rules = [
            'nombre_usuario' => 'unique:users,nombre_usuario,' . $user->id,
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'min:6|confirmed',
            'estado' => 'boolean',
        ];

        $this->validate($request, $rules);

        $user->fill( $request->only([
            'nombre_usuario',
            'persona_id',
            'cargo_usuario',
            'estado'
        ]));


        if ($request->has('email') && $user->email != $request->email) {

            $user->email_verified_at = null;
            $user->remember_token = User::generarRememberToken();

            $user->email = $request->email;
        }

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        if (!$user->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $user->save();

        return $this->showOne($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showOne($user);
    }
}
