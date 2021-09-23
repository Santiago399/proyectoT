<?php

namespace Database\Seeders;

use App\Models\TipoMaterial;
use Illuminate\Database\Seeder;

class TipoMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoMaterial::factory(10)->create();
    }
}
