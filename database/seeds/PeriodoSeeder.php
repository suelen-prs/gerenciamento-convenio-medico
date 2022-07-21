<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Periodo::create(['nome' => 'Janeiro']);
        Periodo::create(['nome' => 'Fevereiro']);
        Periodo::create(['nome' => 'Março']);
        Periodo::create(['nome' => 'Abril']);
        Periodo::create(['nome' => 'Maio']);
        Periodo::create(['nome' => 'Junho']);
        Periodo::create(['nome' => 'Julho']);
        Periodo::create(['nome' => 'Agosto']);
        Periodo::create(['nome' => 'Setembro']);
        Periodo::create(['nome' => 'Outubro']);
        Periodo::create(['nome' => 'Novembro']);
        Periodo::create(['nome' => 'Dezembro']);

    }
}
