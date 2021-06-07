<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermisoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $permisos = $user->permisos;

        return $this->showAll($permisos);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Permiso $permiso)
    {
        $user->permisos()->syncWithoutDetaching([$permiso->id]);

        return $this->showAll($user->permisos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Permiso $permiso)
    {
        if(!$user->permisos()->find($permiso->id)){
            return $this->errorResponse('El permiso especificado no es una permiso de este usuario', 404);
        }

        $user->permisos()->detach([$permiso->id]);
        
        return $this->showAll($user->permisos);
    }
}
