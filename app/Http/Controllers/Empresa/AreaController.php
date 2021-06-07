<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\ApiController;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();

        return $this->showAll( $areas );
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
            'empresa_id' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        $inputs = $request->all();

        $area = Area::create($inputs);

        return $this->showOne($area, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return $this->showOne( $area );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $rules = [
            'empresa_id' => 'numeric'
        ];

        $this->validate($request, $rules);

        $area->fill($request->only([
            'nombre',
            'descripcion',
            'empresa_id'
        ]));

        if (!$area->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $area->save();

        return $this->showOne($area);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        
        return $this->showOne($area);
    }
}
