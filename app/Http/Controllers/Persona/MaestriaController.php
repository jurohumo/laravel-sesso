<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\ApiController;
use App\Models\Maestria;
use Illuminate\Http\Request;

class MaestriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestrias = Maestria::all();

        return $this->showAll($maestrias);
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

        $maestria = Maestria::create($inputs);

        return $this->showOne($maestria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function show(Maestria $maestria)
    {
        return $this->showOne($maestria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestria $maestria)
    {
        $maestria->fill($request->only([
            'nombre',
            'descripcion',
        ]));

        if (!$maestria->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $maestria->save();

        return $this->showOne($maestria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maestria  $maestria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestria $maestria)
    {
        $maestria->delete();

        return $this->showOne($maestria);
    }
}
