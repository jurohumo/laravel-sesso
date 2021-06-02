<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\ApiController;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();

        return $this->showAll($personas);
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
            'tipo_documento_id' => 'required',
            'cargo_id' => 'required',
            'sexo_id' => 'required',
            'numero_documento' => 'required|numeric',
            'cmp_cep' => 'numeric',
            'nombres' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required|date',
        ];

        $this->validate($request, $rules);

        $persona = Persona::create($request->all());

        return $this->showOne($persona, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $this->showOne($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $rules = [
            'tipo_documento_id' => 'numeric',
            'cargo_id' => 'numeric',
            'sexo_id' => 'numeric',
            'numero_documento' => 'numeric',
            'cmp_cep' => 'numeric',
            'telefono' => 'numeric',
            'fecha_nacimiento' => 'date',
        ];

        $this->validate($request, $rules);

        $persona->fill($request->only([
            'tipo_documento_id',
            'cargo_id',
            'sexo_id',
            'numero_documento',
            'cmp_cep',
            'nombres',
            'apellido_pat',
            'apellido_mat',
            'telefono',
            'direccion',
            'fecha_nacimiento',
        ]));

        if ($persona->isClean()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $persona->save();

        return $this->showOne($persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return $this->showOne( $persona );
    }
}
