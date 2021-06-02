<?php

namespace App\Http\Controllers\Maestras;

use App\Http\Controllers\ApiController;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_documento = TipoDocumento::all();

        return $this->showAll($tipos_documento);
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

        $tipo_documento = TipoDocumento::create($inputs);

        return $this->showOne($tipo_documento, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        return $this->showOne($tipoDocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->fill($request->only([
            'nombre', 'descripcion'
        ]));

        if (!$tipoDocumento->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $tipoDocumento->save();

        return $this->showOne($tipoDocumento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->delete();

        return $this->showOne($tipoDocumento);
    }
}
