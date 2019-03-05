<?php

use App\Http\Model\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            "KEY_" => "business.name",
            "VALUE_" => "Zawiyah dental"
        ]);

        Configuration::create([
            "KEY_" => "business.address1",
            "VALUE_" => "Jalan Tok Kiah"
        ]);

        Configuration::create([
            "KEY_" => "business.address2",
            "VALUE_" => "Kemaman"
        ]);

        Configuration::create([
            "KEY_" => "business.address2",
            "VALUE_" => "Terengganu"
        ]);

    }
}
