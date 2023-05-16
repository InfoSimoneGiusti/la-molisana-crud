<?php

namespace Database\Seeders;

use App\Models\Pasta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pastas = config('pasta');

        foreach ($pastas as $pasta) {
            $newPasta = new Pasta();
            $newPasta->src = $pasta["src"];
            $newPasta->title = $pasta["titolo"];
            $newPasta->kind = $pasta["tipo"];
            $newPasta->cooking_time = $pasta["cottura"];
            $newPasta->weight = $pasta["peso"];
            $newPasta->description = $pasta["descrizione"];
            $newPasta->save();
        }
    }
}
