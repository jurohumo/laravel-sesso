<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\Controller;
use App\Models\Maestria;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaMaestriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Persona $persona)
    {
        $maestrias = $persona->maestrias;

        return $this->showAll($maestrias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona, Maestria $maestria)
    {
        $persona->maestrias()->syncWithoutDetaching([$maestria->id]);

        return $this->showAll($persona->maestrias);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona, Maestria $maestria)
    {
        if(!$persona->maestrias()->find($maestria->id)){
            return $this->errorResponse('La maestria especificada no es una maestria de esta persona', 404);
        }

        $persona->maestrias()->detach([$maestria->id]);
        
        return $this->showAll($persona->maestrias);
    }
}
