<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // Ejecutamos el Seeder "CursoSeeder" que se encuentra otro archivo
        // $this->call(CursoSeeder::class);

        // Ejecutamos los Factories que se encuentran otro archivo
        // 1er_parametro: Reciben como parametro un valor Integer que indica el número de registros que queremos crear
        User::factory(10)->create();
        Curso::factory(50)->create();

    }
}
