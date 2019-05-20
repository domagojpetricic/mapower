<?php

use Illuminate\Database\Seeder;
use App\Operator;

class OperatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operator::truncate();

        Operator::create(['name' => 'operator1']);
        Operator::create(['name' => 'operator2']);
        Operator::create(['name' => 'operator3']);
        Operator::create(['name' => 'operator4']);
        Operator::create(['name' => 'operator5']);

    }
}
