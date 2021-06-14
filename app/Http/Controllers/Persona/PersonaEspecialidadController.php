<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\ApiController;
use App\Models\Especialidad;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaEspecialidadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $persona)
    {
        $especialidades = $persona->especialidades;

        return $this->showAll($especialidades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona, Especialidad $especialidad)
    {
        $persona->especialidades()->syncWithoutDetaching([$especialidad->id]);

        return $this->showAll($persona->especialidades);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona, Especialidad $especialidad)
    {
        if(!$persona->especialidades()->find($especialidad->id)){
            return $this->errorResponse('La especialidad especificada no es una especialidad de esta persona', 404);
        }

        $persona->especialidades()->detach([$especialidad->id]);
        
        return $this->showAll($persona->especialidades);
    }
}
