<?php

use Illuminate\Database\Seeder;
use App\ConfirmaPagamento;

class ConfirmaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfirmaPagamento::create(['pago' => 'Em aberto']);
        ConfirmaPagamento::create(['pago' => 'Pago']);

    }
}
