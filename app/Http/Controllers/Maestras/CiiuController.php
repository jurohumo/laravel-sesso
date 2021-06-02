<?php

namespace App\Http\Controllers\Maestras;

use App\Http\Controllers\ApiController;
use App\Models\Ciiu;
use Illuminate\Http\Request;

class CiiuController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciiu = Ciiu::all();

        return $this->showAll($ciiu);
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
            'codigo' => 'required',
        ];

        $this->validate($request, $rules);


        $inputs = $request->all();

        $ciiu = Ciiu::create($inputs);

        return $this->showOne($ciiu, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciiu = Ciiu::findOrFail($id);

        return $this->showOne($ciiu);
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
        $ciiu = Ciiu::findOrFail($id);

        $ciiu->fill($request->only([
            'nombre',
            'codigo',
            'descripcion',
        ]));

        if (!$ciiu->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $ciiu->save();

        return $this->showOne($ciiu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciiu = Ciiu::findOrFail($id);

        $ciiu->delete();

        return $this->showOne($ciiu);
    }
}
