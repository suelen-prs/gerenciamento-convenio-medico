<?php

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
        $this->call(PeriodoSeeder::class);
        $this->call(ConfirmaPagamentoSeeder::class);
        $this->call(VencimentoSeeder::class);

    }
}
