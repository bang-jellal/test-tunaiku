<?php

use Illuminate\Database\Seeder;

class NominalAmmountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\NominalAmmount::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 2000000; $i <= 15000000; $i++) {
            $item = new \App\NominalAmmount();
            $item->nominal           = $nominal = $i;
            $item->additional_number = $additional_number = (3/100) * $i;
            $item->total = $total    = $nominal + $additional_number;
            $item->save();

            if ($total >= 15000000)
                break;
        }
    }
}
