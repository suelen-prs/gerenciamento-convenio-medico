<?php

use Illuminate\Database\Seeder;
use App\Vencimento;

class VencimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vencimento::create(['dia' => 5]);
        Vencimento::create(['dia' => 10]);
        Vencimento::create(['dia' => 15]);
        Vencimento::create(['dia' => 20]);
        Vencimento::create(['dia' => 25]);
        Vencimento::create(['dia' => 30]);

    }
}
