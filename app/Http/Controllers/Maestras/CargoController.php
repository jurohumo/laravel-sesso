<?php

namespace App\Http\Controllers\Maestras;

use App\Http\Controllers\ApiController;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::all();

        return $this->showAll($cargos);
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
            'nombre' => 'required',
        ];

        $this->validate($request, $rules);


        $inputs = $request->all();

        $cargo = Cargo::create($inputs);

        return $this->showOne($cargo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return $this->showOne($cargo);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {

        $cargo->fill($request->only([
            'nombre',
            'descripcion',
        ]));

        if (!$cargo->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $cargo->save();

        return $this->showOne($cargo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return $this->showOne($cargo);
    }
}
