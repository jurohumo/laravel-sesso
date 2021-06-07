<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\ApiController;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaUserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empresa $empresa)
    {
        $usuarios = $empresa->usuarios;

        return $this->showAll($usuarios);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa, $id)
    {
        $empresa->usuarios()->syncWithoutDetaching([$id]);

        return $this->showAll($empresa->usuarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa, $id)
    {
        if(!$empresa->usuarios()->find($id)){
            return $this->errorResponse('El usuario especificado no es un usuario de esta empresa', 404);
        }

        if($id == $empresa->usuario_id){
            return $this->errorResponse('No se puede eliminar el usuario administrador de la empresa', 404);
        }


        $empresa->usuarios()->detach([$id]);
        
        return $this->showAll($empresa->usuarios);
    }
}
