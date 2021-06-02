<?php

namespace App\Http\Controllers\Maestras;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Tipo_Cliente;
use Illuminate\Http\Request;

class Tipo_ClienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_Cliente = Tipo_Cliente::all();

        return $this->showAll($tipo_Cliente);
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

        $tipo_Cliente = Tipo_Cliente::create($inputs);

        return $this->showOne($tipo_Cliente, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_Cliente = Tipo_Cliente::findOrFail($id);

        return $this->showOne($tipo_Cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $tipo_Cliente = Tipo_Cliente::findOrFail($id);

        $tipo_Cliente->fill($request->only([
            'nombre', 'descripcion'
        ]));

        if (!$tipo_Cliente->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $tipo_Cliente->save();

        return $this->showOne($tipo_Cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_Cliente = Tipo_Cliente::findOrFail($id);

        $tipo_Cliente->delete();

        return $this->showOne($tipo_Cliente);
    }
}
