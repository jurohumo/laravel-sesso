<?php

namespace App\Http\Controllers\ProgramacionEmo;

use App\Http\Controllers\ApiController;
use App\Models\ProgramacionEmo;
use Illuminate\Http\Request;

class ProgramacionEmoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programaciones_emo = ProgramacionEmo::all();

        return $this->showAll( $programaciones_emo );
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
            'empresa_id' => 'required|numeric',
            'fecha_programacion' => 'required'
        ];

        $this->validate( $request, $rules );

        $inputs = $request->all();

        $programacion_emo = ProgramacionEmo::create($inputs);

        return $this->showOne($programacion_emo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramacionEmo $programacionEmo)
    {
        return $this->showOne($programacionEmo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramacionEmo $programacionEmo)
    {
        $programacionEmo->fill($request->only([
            'empresa_id',
            'fecha_programacion'
        ]));

        if (!$programacionEmo->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $programacionEmo->save();

        return $this->showOne($programacionEmo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramacionEmo  $programacionEmo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramacionEmo $programacionEmo)
    {
        $programacionEmo->delete();

        return $this->showOne($programacionEmo);
    }
}
