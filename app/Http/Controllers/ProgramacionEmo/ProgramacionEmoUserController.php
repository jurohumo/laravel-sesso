<?php

namespace App\Http\Controllers\ProgramacionEmo;

use App\Http\Controllers\ApiController;
use App\Models\ProgramacionEmo;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramacionEmoUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProgramacionEmo $programacionEmo)
    {
        $usuarios = $programacionEmo->usuarios;

        return $this->showAll( $usuarios );
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
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramacionEmo $programacionEmo, User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramacionEmo $programacionEmo, User $user)
    {

        $programacionEmo->usuarios()->syncWithoutDetaching([$user->id]);

        return $this->showAll($programacionEmo->usuarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramacionEmo $programacionEmo, User $user)
    {
        if(!$programacionEmo->usuarios()->find($user->id)){
            return $this->errorResponse('La persona especificada no se encuentra en esta programación', 404);
        }

        $programacionEmo->usuarios()->detach([$user->id]);
        
        return $this->showAll($programacionEmo->usuarios);
    }
}
