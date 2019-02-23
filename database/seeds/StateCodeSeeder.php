<?php

use App\Http\Model\StateCode;
use Illuminate\Database\Seeder;

class StateCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StateCode::create(['code' => 'JHR', 'name' => 'JOHOR']);
        StateCode::create(['code' => 'SEL', 'name' => 'SELANGOR']);
        StateCode::create(['code' => 'PRK', 'name' => 'PERAK']);
        StateCode::create(['code' => 'PNG', 'name' => 'PENANG']);
        StateCode::create(['code' => 'KDH', 'name' => 'KEDAH']);
        StateCode::create(['code' => 'KLTN', 'name' => 'KELANTAN']);
        StateCode::create(['code' => 'TRG', 'name' => 'TERENGGANU']);
        StateCode::create(['code' => 'PHG', 'name' => 'PAHANG']);
        StateCode::create(['code' => 'SWK', 'name' => 'SARAWAK']);
        StateCode::create(['code' => 'SBH', 'name' => 'SABAH']);
    }
}
