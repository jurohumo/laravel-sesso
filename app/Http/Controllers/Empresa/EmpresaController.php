<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\ApiController;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        return $this->showAll($empresas);
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
            'tipo_cliente_id' => 'required',
            'usuario_id' => 'required',
            'ciiu_id' => 'required',
            'ruc' => 'required|numeric',
            'razon_social' => 'required',
            'sigla' => 'required',
            'telefono_01' => 'numeric',
            'telefono_02' => 'numeric',
            'pais' => 'required',
            'departamento' => 'required',
            'provincia' => 'required',
            'distrito' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email|unique:empresas',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['urlimage'] = '1.png';

        $empresa = Empresa::create($data);

        return $this->showOne($empresa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return $this->showOne($empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $rules = [
            'ruc' => 'unique:empresas,ruc,' . $empresa->id,
            'correo' => 'email',
            'telefono_01' => 'numeric',
            'telefono_02' => 'numeric',
        ];

        $this->validate($request, $rules);

        $empresa->fill($request->all());

        if ($empresa->isClean()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $empresa->save();

        return $this->showOne($empresa);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return $this->showOne( $empresa );
    }
}
