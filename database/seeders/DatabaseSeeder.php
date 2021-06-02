<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Sexo::create(['nombre' => 'Masculino']);
        \App\Models\Sexo::create(['nombre' => 'Femenino']);

        \App\Models\TipoDocumento::create(['nombre' => 'DNI', 'descripcion'=> 'Documento nacional de identidad']);
        \App\Models\TipoDocumento::create(['nombre' => 'C.E.', 'descripcion'=> 'Carnet de Extranjeria']);

        \App\Models\Tipo_Cliente::create(['nombre' => 'Sesso']);
        \App\Models\Tipo_Cliente::create(['nombre' => 'Clinica']);
        \App\Models\Tipo_Cliente::create(['nombre' => 'Cliente']);

        \App\Models\Cargo::create(['nombre' => 'Asistente Administrativo']);
        \App\Models\Cargo::create(['nombre' => 'Doctor']);
        \App\Models\Cargo::create(['nombre' => 'Recepcionista']);

        \App\Models\Ciiu::create(['nombre' => 'CULTIVO DE CEREALES (EXCEPTO ARROZ), LEGUMBRES Y SEMILLAS OLEAGINOSAS', 'codigo' => '0111']);
        \App\Models\Ciiu::create(['nombre' => 'CULTIVO DE ARROZ', 'codigo' => '0112']);
        \App\Models\Ciiu::create(['nombre' => 'CULTIVO DE HORTALIZAS Y MELONES, RAÍCES Y TUBÉRCULOS.', 'codigo' => '0113']);
        \App\Models\Ciiu::create(['nombre' => 'CULTIVO DE CAÑA DE AZÚCAR', 'codigo' => '0114']);
        \App\Models\Ciiu::create(['nombre' => 'CULTIVO DE TABACO', 'codigo' => '0115']);


    }
}
