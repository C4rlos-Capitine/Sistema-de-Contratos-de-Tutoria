<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//use App\Models\Area;

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

        \App\Models\User::create([
             'name' => '01.abcd.2020',
             'email' => 'carlos2@example.com',
             'password' => Hash::make('zxcvbnm'),
             'tipo_user' => 1
         ]);

        //Registo Niveis dos docentes
        \App\Models\Nivel::create([
            'designacao_nivel'=>'Licenciado',
            'remuneracao_hora'=>800,
        ]);
        \App\Models\Nivel::create([
            'designacao_nivel'=>'Mestrado',
            'remuneracao_hora'=>1000,
        ]);
        \App\Models\Nivel::create([
            'designacao_nivel'=>'Doutorado',
            'remuneracao_hora'=>1200,
        ]);

        //Registo dos tipos de contratos
        \App\Models\Tipo_contrato::create([
            'designacao_tipo_contrato' => 'disciplinas normais'
        ]);

        \App\Models\Tipo_contrato::create([
            'designacao_tipo_contrato' => 'disciplinas laboratórias'
        ]);


        //registo da categoria de discplina
        \App\Models\Categoria::create([
            'designacao_categoria' => 'Geral',
        ]);

        \App\Models\Categoria::create([
            'designacao_categoria' => 'Específica',
        ]);
        \App\Models\Categoria::create([
            'designacao_categoria' => 'Prática',
        ]);

        //Registo do representante da UP
        \App\Models\Representante::create([
            'nome_representante' => 'Marisa Guião',
            'apelido_representante' => 'de Mendonça',
            'genero_representante' => 'Femenino',
            'id_nivel_contrantante' => 3
        ]);
    }
}
